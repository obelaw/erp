<?php

namespace Obelaw\Sales\Models;

use Obelaw\Twist\Base\BaseModel;

class SalesFlatOrderAddress extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'order_id',
        'country_id',
        'city_id',
        'state_id',
        'area_id',
        'postcode',
        'street_line_1',
        'street_line_2',
        'phone_number',
    ];
}
