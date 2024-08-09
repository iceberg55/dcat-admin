<?php

namespace Dcat\Admin\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * Class ReferralPlan
 * @package App\Models
 * @property int id
 * @property string name
 * @property int min_income
 * @property float rate
 * @property Carbon created_at
 * @property Carbon updated_at
 */
class ReferralPlan extends Model
{
    use HasFactory;
}
