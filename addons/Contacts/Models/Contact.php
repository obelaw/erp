<?php

namespace Obelaw\Contacts\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;
use Obelaw\Contacts\Models\Address;
use Obelaw\Contacts\Models\ContactAuth;
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

    public function auth(): MorphOne
    {
        return $this->morphOne(ContactAuth::class, 'contact');
    }
}
