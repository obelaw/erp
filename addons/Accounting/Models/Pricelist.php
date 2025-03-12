<?php

namespace Obelaw\Accounting\Models;

use Obelaw\Twist\Base\BaseModel;

class Pricelist extends BaseModel
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
