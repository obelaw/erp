<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Twist\Base\BaseModel;

class PlaceItemLog extends BaseModel
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
