<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Framework\Base\ModelBase;

class TransferBundle extends ModelBase
{
    protected $table = 'warehouse_transfer_bundles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'transfer_id',
        'transfer_item_id',
        'serialized',
        'status',
    ];
}
