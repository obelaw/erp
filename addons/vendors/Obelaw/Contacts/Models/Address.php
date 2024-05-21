<?php

namespace Obelaw\Contacts\Models;

use Obelaw\Contacts\Models\Pins\City;
use Obelaw\Contacts\Models\Pins\Country;
use Obelaw\Framework\Base\ModelBase;

class Address extends ModelBase
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
        return $this->hasOne(Country::class, 'id', 'country_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
}
