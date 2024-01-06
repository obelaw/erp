<?php

namespace Obelaw\Contacts\Models;

use Obelaw\Framework\Base\ModelBase;

class Contact extends ModelBase
{
    protected $table = 'contacts_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'type',
        'job_position',
        'image',
        'name',
        'phone',
        'mobile',
        'email',
        'website',
    ];
}
