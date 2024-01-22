<?php

namespace Dcat\Admin\Services;

use Dcat\Admin\Enums\TransactionStatus;
use Dcat\Admin\Enums\TransactionType;
use Dcat\Admin\Exception\CreditException;
use Dcat\Admin\Exception\TransactionException;
use Exception;
use Dcat\Admin\Models\Transaction;
use Dcat\Admin\Admin;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Throwable;

class TransactionService
{
    /**
     * @var CreditService
     */
    private CreditService $creditService;

    /**
     * @param CreditService $creditService
     */
    public function __construct(
        CreditService $creditService
    ) {
        $this->creditService = $creditService;
    }

    /**
     * @param Model $owner
     * @return mixed
     */
    public function getUserTransactions(Model $owner): mixed
    {
        return Transaction::where([
            ['owner_type', $owner::class],
            ['owner_id', $owner->getKey()],
        ])->get();
    }

    /**
     * @return mixed
     * @throws AuthenticationException
     */
    public function getCurrentUserTransactions(): mixed
    {
        if (! Admin::user()) {
            throw new AuthenticationException();
        }

        return $this->getUserTransactions(Admin::user());
    }

    /**
     * @param Model $owner
     * @return string
     */
    private function getUserLockKey(Model $owner): string
    {
        return class_basename($owner).':'.$owner->getKey().':Credit';
    }

    /**
     * @param Model $owner
     * @param TransactionType $type
     * @param float|int $amount
     * @param string $currency
     * @param array $information
     * @param string|null $ip
     * @param string|null $wallet_address
     * @return Transaction
     * @throws TransactionException
     */
    public function createTransactionForUser(
        Model $owner,
        TransactionType $type,
        float|int $amount,
        string $currency = Transaction::CURRENCY_USD,
        array $information = [],
        string $ip = null,
        string $wallet_address = null
    ): Transaction {
        $credit = $this->creditService->getUserCredit($owner);

        if (in_array($type->value, TransactionType::NEGATIVE_TYPES) && $amount > $credit) {
            throw new TransactionException('Insufficient credit.');
        }

        $transaction = new Transaction();
        $transaction->owner()->associate($owner);
        $transaction->type = $type;
        $transaction->amount = $amount;
        $transaction->currency = $currency;
        $transaction->information = $information;
        $transaction->ip = $ip;
        $transaction->wallet_address = $wallet_address;
        $transaction->save();

        return $transaction;
    }

    /**
     * @param TransactionType $type
     * @param float|int $amount
     * @param string $currency
     * @param array $information
     * @param string|null $ip
     * @param string|null $wallet_address
     * @return Transaction
     * @throws TransactionException
     */
    public function createTransactionForCurrentUser(
        TransactionType $type,
        float|int $amount,
        string $currency = Transaction::CURRENCY_USD,
        array $information = [],
        string $ip = null,
        string $wallet_address = null
    ): Transaction {
        if (! Admin::user()) {
            throw new AuthenticationException();
        }

        return $this->createTransactionForUser(Admin::user(), $type, $amount, $currency, $information, $ip, $wallet_address);
    }

    /**
     * @param Transaction $transaction
     * @param TransactionStatus $status
     * @return void
     * @throws CreditException
     * @throws TransactionException
     * @throws \Throwable
     */
    public function setTransactionStatus(Transaction $transaction, TransactionStatus $status): void
    {
        $lock = Cache::lock($this->getUserLockKey($transaction->owner));
        if ($lock->get()) {
            try {
                $oldStatus = $transaction->status;

                if (! in_array($status, TransactionStatus::STATUSES)) {
                    throw new TransactionException('Status is not valid !');
                }

                $transaction->status = $status;
                $transaction->save();

                $this->creditService->updateUserCredit($transaction->owner);
            } catch (CreditException $exception) {
                $transaction->status = $oldStatus;
                $transaction->save();

                $this->creditService->updateUserCredit($transaction->owner);

                throw $exception;
            } catch (Throwable $exception) {
                throw $exception;
            }
            finally {
                $lock->release();
            }
        } else {
            throw new TransactionException('Another transaction is in Process.');
        }
    }

    /**
     * @param Transaction $transaction
     * @return void
     * @throws Exception|Throwable
     */
    public function setTransactionStatusSuccess(Transaction $transaction): void
    {
        $this->setTransactionStatus($transaction, TransactionStatus::SUCCESS);
    }

    /**
     * @param Transaction $transaction
     * @return void
     * @throws Exception|Throwable
     */
    public function setTransactionStatusFailed(Transaction $transaction): void
    {
        $this->setTransactionStatus($transaction, TransactionStatus::FAILED);
    }

    /**
     * @param Transaction $transaction
     * @return void
     * @throws Exception|Throwable
     */
    public function setTransactionStatusPending(Transaction $transaction): void
    {
        $this->setTransactionStatus($transaction, TransactionStatus::PENDING);
    }
}