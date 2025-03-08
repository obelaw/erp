<?php

namespace Obelaw\ERP\Addons\Contacts\Models;

use Obelaw\ERP\Addons\Contacts\Models\Pin;
use Obelaw\Twist\Base\BaseModel;

class Address extends BaseModel
{
    protected $table = 'contacts_addresses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact_id',
        'country_id',
        'city_id',
        'state_id',
        'area_id',
        'label',
        'postcode',
        'street_line_1',
        'street_line_2',
        'phone_number',
        'is_main',
    ];

    public function country()
    {
        return $this->hasOne(Pin::class, 'id', 'country_id');
    }

    public function city()
    {
        return $this->hasOne(Pin::class, 'id', 'city_id');
    }
}