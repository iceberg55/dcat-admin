<?php

namespace Dcat\Admin\Services;

use Dcat\Admin\Enums\TransactionStatus;
use Dcat\Admin\Enums\TransactionType;
use Dcat\Admin\Exception\CreditException;
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

        foreach (TransactionType::POSITIVE_TYPES as $type) {
            $balance += Transaction::where([
                ['owner_type', $owner::class],
                ['owner_id', $owner->getKey()],
                ['type', $type],
                ['status', TransactionStatus::SUCCESS],
            ])->get()->sum('amount');
        }
        foreach (TransactionType::NEGATIVE_TYPES as $type) {
            $balance -= Transaction::where([
                ['owner_type', $owner::class],
                ['owner_id', $owner->getKey()],
                ['type', $type],
                ['status', TransactionStatus::SUCCESS],
            ])->get()->sum('amount');
        }

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