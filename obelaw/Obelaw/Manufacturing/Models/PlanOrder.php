<?php

namespace Obelaw\Manufacturing\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class PlanOrder extends ModelBase
{
    use HasFactory;

    protected $table = 'manufacturing_plan_orders';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'plan_id',
        'order_id',
    ];
}
