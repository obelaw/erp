<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Twist\Base\BaseModel;
use Obelaw\Sales\Models\SalesFlatOrder;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;

class Invoice extends BaseModel
{
    use HasSerialize;

    protected $table = 'sales_invoices';

    protected static $serialSection = 'INV';
    protected static $serialHit = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entry_id',
        'order_id',
    ];


    public function entry()
    {
        return $this->hasOne(AccountEntry::class, 'id', 'entry_id');
    }

    public function order()
    {
        return $this->hasOne(SalesFlatOrder::class, 'id', 'order_id');
    }
}
