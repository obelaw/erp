<?php

namespace Obelaw\ERP\Addons\Accounting\Models;

use Obelaw\Framework\Base\ModelBase;

class Pricelist extends ModelBase
{
    protected $table = 'accounting_pricelists';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];

    public function items()
    {
        return $this->hasMany(PriceListitem::class, 'list_id', 'id');
    }
}
