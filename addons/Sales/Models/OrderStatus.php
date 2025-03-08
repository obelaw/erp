<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\Twist\Base\BaseModel;

class OrderStatus extends BaseModel
{
    protected $table = 'sales_order_statuses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];
}
