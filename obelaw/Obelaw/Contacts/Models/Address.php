<?php

namespace Obelaw\Contacts\Models;

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
        'label',
        'country_code',
        'city_id',
        'postcode',
        'street_line_1',
        'street_line_2',
        'phone_number',
        'is_main',
    ];
}
