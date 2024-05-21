<?php

namespace Obelaw\Accounting\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Accounting\Model\PriceListItem;
use Obelaw\Framework\Base\ModelBase;

class PriceList extends ModelBase
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'start_date',
        'end_date',
    ];

    public function items()
    {
        return $this->hasMany(PriceListItem::class, 'list_id', 'id');
    }
}
