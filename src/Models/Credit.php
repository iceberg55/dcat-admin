<?php

namespace Dcat\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Credit
 * @package App\Models
 * @property int id
 * @property int balance
 * @property int owner_id
 * @property string owner_type
 * @property object owner
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class Credit extends Model
{
    use HasFactory;

    protected $casts = [
        'balance' => 'decimal:2',
    ];

    protected $fillable = [
        'owner_type',
        'owner_id',
    ];

    public function owner() {
        return $this->morphTo();
    }
}
