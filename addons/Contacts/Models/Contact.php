<?php

namespace Obelaw\ERP\Addons\Contacts\Models;

use Obelaw\ERP\Addons\Contacts\Models\Address;
use Obelaw\Twist\Base\BaseModel;

class Contact extends BaseModel
{
    protected $table = 'contacts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'document_type',
        'image',
        'name',
        'phone',
        'email',
        'website',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class, 'contact_id', 'id');
    }
}
