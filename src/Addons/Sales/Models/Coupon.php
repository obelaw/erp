<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;

class Coupon extends ModelBase
{
    protected $table = 'sales_coupons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'coupon_name',
        'coupon_code',
        'discount_type',
        'discount_value',
        'condition',
        'condition_data',
        'start_at',
        'ends_at',
        'is_active',
    ];
}
