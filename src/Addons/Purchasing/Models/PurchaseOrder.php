<?php

namespace Obelaw\ERP\Addons\Purchasing\Models;

use Obelaw\Accounting\Model\Bill;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;
use Obelaw\ERP\Addons\Purchasing\Models\PurchaseOrderItem;
use Obelaw\ERP\Addons\Purchasing\Models\Vendor;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Purchasing\Models\PurchaseReceive;

class PurchaseOrder extends ModelBase
{
    use HasSerialize;

    protected static $serialSection = 'OP';
    protected $table = 'purchasing_purchase_orders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'sub_total',
        'tax_total',
        'grand_total',
        'status',
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

    public function bill()
    {
        return $this->hasOne(Bill::class, 'order_id', 'id');
    }

    public function receive()
    {
        return $this->hasOne(PurchaseReceive::class, 'order_id', 'id');
    }

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class, 'order_id', 'id');
    }
}
