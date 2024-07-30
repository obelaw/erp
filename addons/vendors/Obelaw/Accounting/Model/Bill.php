<?php

namespace Obelaw\Accounting\Model;

use Obelaw\Accounting\Model\Vendor;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;

class Bill extends ModelBase
{
    use HasSerialize;

    protected static $serialSection = 'bill';
    protected static $serialHit = 'bil';
    protected $table = 'accounting_bills';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'vendor_id',
        'order_id',
        'entry_id',
        'sub_total',
        'tax_total',
        'grand_total',
    ];

    public function vendor()
    {
        return $this->hasOne(Vendor::class, 'id', 'vendor_id');
    }

    public function items()
    {
        return $this->hasMany(BillItem::class, 'bill_id', 'id');
    }
}
