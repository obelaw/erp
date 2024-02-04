<?php

namespace Obelaw\Contacts\Models;

use Obelaw\Framework\Base\ModelBase;

class Contact extends ModelBase
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
}
