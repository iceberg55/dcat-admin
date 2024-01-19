<?php

namespace Dcat\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Transaction
 * @package App\Models
 * @property int id
 * @property int user_id
 * @property string type
 * @property string status
 * @property int amount
 * @property string currency
 * @property array information
 * @property string ip
 * @property string wallet_address
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Transaction extends Model
{
    use HasFactory;

    const TYPE_PAYMENT = 'PAYMENT';
    const TYPE_WITHDRAW = 'WITHDRAW';
    const TYPE_DEPOSIT = 'DEPOSIT';
    const TYPE_REFERRAL = 'REFERRAL';
    const TYPE_GIFT = 'GIFT';

    const TYPES = [
        self::TYPE_PAYMENT,
        self::TYPE_WITHDRAW,
        self::TYPE_DEPOSIT,
        self::TYPE_REFERRAL,
        self::TYPE_GIFT,
    ];

    const POSITIVE_TYPES = [
        self::TYPE_DEPOSIT,
        self::TYPE_REFERRAL,
        self::TYPE_GIFT,
    ];

    const NEGATIVE_TYPES = [
        self::TYPE_PAYMENT,
        self::TYPE_WITHDRAW,
    ];

    const STATUS_PENDING = 'PENDING';
    const STATUS_SUCCESS = 'SUCCESS';
    const STATUS_FAILED = 'FAILED';

    const STATUSES = [
        self::STATUS_PENDING,
        self::STATUS_SUCCESS,
        self::STATUS_FAILED,
    ];

    const CURRENCY_USD = 'USD';

    const CURRENCIES = [
        self::CURRENCY_USD,
    ];

    protected $attributes = [
        'type' => self::TYPE_PAYMENT,
        'status' => self::STATUS_PENDING,
        'currency' => self::CURRENCY_USD,
    ];

    protected $casts = [
        'information' => 'array',
    ];

    public function owner() {
        return $this->morphTo();
    }
}
