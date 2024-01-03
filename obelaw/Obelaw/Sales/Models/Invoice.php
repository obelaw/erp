<?php

namespace Obelaw\Sales\Models;

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Base\ModelBase;
use Obelaw\Serialization\Traits\HasSerialize;

class Invoice extends ModelBase
{
    use HasSerialize;

    protected $table = 'sales_invoices';

    protected static $serialPrefix = 'INV';
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
        return $this->hasOne(SalesOrder::class, 'id', 'order_id');
    }
}
