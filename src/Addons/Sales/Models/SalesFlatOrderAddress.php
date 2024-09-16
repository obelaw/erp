<?php

namespace Obelaw\Sales\Models;

use Obelaw\Framework\Base\ModelBase;

class SalesFlatOrderAddress extends ModelBase
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
