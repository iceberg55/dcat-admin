<?php

namespace Dcat\Admin\Models;

use Carbon\Carbon;
use Dcat\Admin\Enums\TransactionStatus;
use Dcat\Admin\Enums\TransactionType;
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

    const CURRENCY_USD = 'USD';

    const CURRENCIES = [
        self::CURRENCY_USD,
    ];

    protected $attributes = [
        'type' => TransactionType::PAYMENT,
        'status' => TransactionStatus::PENDING,
        'currency' => self::CURRENCY_USD,
    ];

    protected $casts = [
        'information' => 'array',
        'type' => TransactionType::class,
        'status' => TransactionStatus::class,
    ];

    public function owner() {
        return $this->morphTo();
    }
}
