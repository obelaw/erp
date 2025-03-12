<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Warehouse\Models\PlaceItem;
use Obelaw\Warehouse\Models\TransferBundle;
use Obelaw\Twist\Base\BaseModel;

class TransferBundleSerial extends BaseModel
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
