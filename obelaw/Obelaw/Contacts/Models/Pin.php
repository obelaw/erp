<?php

namespace Obelaw\Contacts\Models;

use Obelaw\Framework\Base\ModelBase;

class Pin extends ModelBase
{
    public $timestamps = false;

    protected $table = 'contacts_pins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'parent_id',
        'name',
        'type',
    ];
}
