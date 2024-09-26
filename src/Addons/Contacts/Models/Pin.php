<?php

namespace Obelaw\ERP\Addons\Contacts\Models;

use Obelaw\Twist\Base\BaseModel;

class Pin extends BaseModel
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