<?php

namespace Dcat\Admin\Services;

use Carbon\Carbon;
use Dcat\Admin\Models\Transaction;
use Dcat\Admin\Models\Voucher;

class VoucherService {
	/**
	 * @param Transaction $transaction
	 * @param $voucherCode
	 *
	 * @return bool
	 */
	public function verify($voucherCode)
	: bool {
		$voucher = Voucher::where('code', $voucherCode)->first();
		if ( !$voucher ) {
			throw new \Exception('voucher not found');
		}
		if ( $voucher->status == Voucher::STATUS_DE_ACTIVE ) {
			throw new \Exception('voucher is not active');
		}
		if ( !Carbon::now()->between($voucher->start_day, $voucher->end_day) ) {
			throw new \Exception('voucher is out of date');
		}
		return TRUE;
	}

	/**
	 * @param Transaction $transaction
	 * @param $voucherCode
	 *
	 * @return Transaction
	 */
	public function use(Transaction $transaction, $voucherCode)
	: Transaction {
		$voucher = Voucher::where('code', $voucherCode)->first();
		if ( !$voucher ) {
			throw new \Exception('voucher not found');
		}
		$discountPrice = ($transaction->amount * $voucher->discount) / 100;
		$transaction->amount = $transaction->amount - $discountPrice;
		$transaction->voucher_id = $voucher->id;
		$transaction->save();
		return $transaction;
	}

	public function useVoucherCode(Transaction $transaction, $voucherCode) {
		$this->verify($voucherCode);
		return $this->use($transaction, $voucherCode);
	}
}
