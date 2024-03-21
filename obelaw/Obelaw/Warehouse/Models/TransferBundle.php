<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;
use Obelaw\Warehouse\Models\Transfer;
use Obelaw\Warehouse\Models\TransferItem;

class TransferBundle extends ModelBase
{
    // use HasSerialize;

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

    public function transfer()
    {
        return $this->hasOne(Transfer::class, 'id', 'transfer_id');
    }

    public function item()
    {
        return $this->hasOne(TransferItem::class, 'id', 'transfer_item_id');
    }

    public function serials()
    {
        return $this->hasMany(TransferBundleSerial::class, 'bundle_id', 'id');
    }
}