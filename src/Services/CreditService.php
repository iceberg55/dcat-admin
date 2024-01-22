<?php

namespace Dcat\Admin\Services;

use Dcat\Admin\Enums\TransactionStatus;
use Dcat\Admin\Enums\TransactionType;
use Dcat\Admin\Exception\CreditException;
use Dcat\Admin\Exception\TransactionException;
use Dcat\Admin\Models\Credit;
use Dcat\Admin\Models\Transaction;
use Dcat\Admin\Admin;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\Model;

class CreditService
{
    /**
     * @param Model $owner
     * @return int|float
     */
    public function getUserCredit(Model $owner): int|float
    {
        try {
            $credit = Credit::where([
                ['owner_type', $owner::class],
                ['owner_id', $owner->getKey()],
            ])->firstOrFail();

            return $credit->balance;
        } catch (Exception $exception) {
            return 0;
        }
    }

    /**
     * @return float|int
     * @throws AuthenticationException
     */
    public function getCurrentUserCredit(): float|int
    {
        if (! Admin::user()) {
            throw new AuthenticationException();
        }

        return $this->getUserCredit(Admin::user());
    }

    /**
     * @param Model $owner
     * @return void
     * @throws CreditException
     */
    public function updateUserCredit(Model $owner): void
    {
        $balance = 0;

        Transaction::where([
            ['owner_type', $owner::class],
            ['owner_id', $owner->getKey()],
            ['status', TransactionStatus::SUCCESS],
        ])->chunk(1000, function ($transactions) use (&$balance) {
            foreach ($transactions as $transaction){
                if( in_array($transaction->type->value, TransactionType::NEGATIVE_TYPES) ){
                    $balance -= $transaction->amount;
                } else if( in_array($transaction->type->value, TransactionType::POSITIVE_TYPES) ){
                    $balance += $transaction->amount;
                } else {
                    throw new TransactionException('Transaction type is not valid ! Id: ' . $transaction->id . ', Type: ' . $transaction->type->value);
                }

                if( $balance < 0 ){
                    throw new CreditException('Credit must be greater or equal zero ! Credit is negative at ' . $transaction->created_at . ' !');
                }
            }
        });

        $credit = Credit::firstOrCreate([
            'owner_type' => $owner::class,
            'owner_id' => $owner->getKey(),
        ]);
        $credit->balance = $balance;
        $credit->save();

        if( $credit->balance < 0 ){
            throw new CreditException('Credit must be greater or equal zero !');
        }
    }
}