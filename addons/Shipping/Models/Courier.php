<?php

namespace Obelaw\Shipping\Models;

use Obelaw\Twist\Base\BaseModel;

class Courier extends BaseModel
{
    protected $table = 'shipping_couriers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'class_instance',
    ];
}
