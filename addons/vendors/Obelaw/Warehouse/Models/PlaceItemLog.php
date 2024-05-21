<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Framework\Base\ModelBase;

class PlaceItemLog extends ModelBase
{
    protected $table = 'warehousing_place_item_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'record_move_type',
        'record_source',
        'record_destination',
    ];
}
