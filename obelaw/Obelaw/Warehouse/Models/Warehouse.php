<?php

namespace Obelaw\Warehouse\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Obelaw\Framework\Base\ModelBase;

class Warehouse extends ModelBase
{
    use HasFactory;

    protected $table = 'warehouse_warehouses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'code',
        'description',
        'address',
    ];

    /**
     * Get a count of inventories
     */
    protected function inventoriesCount(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->inventories->count()
        );
    }

    public function inventories()
    {
        return $this->hasMany(Inventory::class, 'warehouse_id', 'id');
    }
}
