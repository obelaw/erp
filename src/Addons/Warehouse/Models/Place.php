<?php

namespace Obelaw\ERP\Addons\Warehouse\Models;

use Obelaw\Framework\Base\ModelBase;

class Place extends ModelBase
{
    protected $table = 'warehousing_places';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'place_id',
        'record_type',
        'name',
        'code',
        'description',
        'address',
    ];

    public function places()
    {
        return $this->hasMany(Place::class, 'place_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(PlaceItem::class, 'place_id', 'id');
    }
}
