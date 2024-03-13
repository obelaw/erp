<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Models\TransferItem;

class TransferBundle extends ModelBase
{
    use HasSerialize;

    protected $table = 'warehouse_transfer_bundles';

    protected static $serialSection = 'BUNDL';

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

    public function item()
    {
        return $this->hasOne(TransferItem::class, 'id', 'transfer_item_id');
    }
}
