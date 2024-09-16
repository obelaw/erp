<?php

namespace Obelaw\ERP\Addons\Warehouse\Models;

use Obelaw\ERP\Addons\Warehouse\Models\PlaceItem;
use Obelaw\ERP\Addons\Warehouse\Models\TransferBundle;
use Obelaw\Framework\Base\ModelBase;

class TransferBundleSerial extends ModelBase
{
    protected $table = 'warehouse_transfer_bundle_serials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bundle_id',
        'item_id',
        'status',
    ];

    public function bundle()
    {
        return $this->hasOne(TransferBundle::class, 'id', 'bundle_id');
    }

    public function item()
    {
        return $this->hasOne(PlaceItem::class, 'id', 'item_id');
    }
}
