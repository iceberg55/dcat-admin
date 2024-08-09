<?php

namespace Dcat\Admin\Services;
use Dcat\Admin\Enums\TransactionStatus;
use Dcat\Admin\Enums\TransactionType;
use Dcat\Admin\Exception\TransactionException;
use Dcat\Admin\Models\ReferralPlan;
use Dcat\Admin\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Throwable;

class ReferralService
{
    /**
     * @var TransactionService
     */
    private TransactionService $transactionService;

    /**
     * @param TransactionService $transactionService
     */
    public function __construct(
        TransactionService $transactionService
    ) {
        $this->transactionService = $transactionService;
    }

    public function getUserReferralCount(Model $user)
    {
        return $user->referrals()->count();
    }

    public function getUserReferralIncome(Model $user)
    {
        return $user->transactions
            ->where('type', TransactionType::REFERRAL)
            ->where('status', TransactionStatus::SUCCESS)
            ->sum('amount');
    }

    public function getUserReferralPlan(Model $user)
    {
        $income = $this->getUserReferralIncome($user);
        $referralPlan = ReferralPlan::query()
            ->where('min_income', '<=', $income)
            ->orderBy('min_income', 'desc')
            ->first();

        return $referralPlan;
    }

    /**
     * @param Model $owner
     * @param Model $for
     * @param float|int $amount
     * @return void
     * @throws TransactionException|Throwable
     */
    public function addReferral(
        Model $owner,
        Model $for,
        float|int $amount
    )
    {
        $referralPlan = $this->getUserReferralPlan($owner);
        if ($referralPlan) {
            $income = $amount * $referralPlan->rate / 100;
            $transaction = $this->transactionService->createTransactionForUser(
                $owner,
                $for,
                TransactionType::REFERRAL,
                $income,
                Transaction::CURRENCY_USD
            );
            $this->transactionService->setTransactionStatusSuccess($transaction);
        }
    }
}
