<?php

namespace Obelaw\Shipping\Models;

use Obelaw\Twist\Base\BaseModel;

class CourierAccount extends BaseModel
{
    protected $table = 'shipping_courier_accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'courier_id',
        'name',
        'credentials',
    ];

    protected $casts = [
        'credentials' => 'array',
    ];

    public function courier()
    {
        return $this->hasOne(Courier::class, 'id', 'courier_id');
    }
}
