<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\Twist\Base\BaseModel;

class OrderCancelReason extends BaseModel
{
    protected $table = 'sales_order_cancel_reasons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
    ];
}
