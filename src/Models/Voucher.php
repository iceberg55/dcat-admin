<?php

namespace Dcat\Admin\Models;

use Dcat\Admin\Models\Transaction;
use Illuminate\Database\Eloquent\Model;

/***
 * @property int id
 * @property int discount
 * @property string code
 * @property string name
 * @property string status
 * @property string description
 * @property Carbon start_day
 * @property Carbon end_day
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property array Transactions
 */
class Voucher extends Model {
	const STATUS_ACTIVE    = 1;
	const STATUS_DE_ACTIVE = 0;
	const STATUSES         = [
		self::STATUS_ACTIVE,
		self::STATUS_DE_ACTIVE,
	];

	protected $casts = [
		'start_day' => 'datetime',
		'end_day' => 'datetime',
	];

	public function transactions() {
		return $this->belongsTo(Transaction::class);
	}
}
