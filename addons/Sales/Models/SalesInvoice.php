<?php

namespace Obelaw\ERP\Addons\Sales\Models;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\ERP\Addons\Audit\Traits\HasSerialize;
use Obelaw\ERP\Addons\Sales\Models\SalesFlatOrder;
use Obelaw\Twist\Base\BaseModel;

class SalesInvoice extends BaseModel
{
    use HasSerialize;

    protected $table = 'sales_invoices';

    protected static $serialSection = 'INV';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
