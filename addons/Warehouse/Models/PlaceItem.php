<?php

namespace Obelaw\Warehouse\Models;

use Obelaw\Catalog\Enums\StockType;
use Obelaw\Catalog\Models\Product;
use Obelaw\Twist\Base\BaseModel;
use Obelaw\Warehouse\Models\Place\Inventory;
use Obelaw\Warehouse\Models\PlaceItemLog;
use Obelaw\Warehouse\Models\TransferBundleSerial;

class PlaceItem extends BaseModel
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            if ($model->product->stock_type == StockType::STORABLE) {
                $model->serial_number = self::generateSerialNumber();
                $model->type = 'storable';
                $model->saveQuietly();
            }

            if ($model->product->stock_type == StockType::CONSUMABLE) {
                $model->type = 'consumable';
                $model->saveQuietly();
            }
        });
    }

    private static function generateSerialNumber($digits = 16)
    {
        return str_pad(
            rand(
                0,
                pow(10, $digits) - 1
            ),
            $digits,
            '0',
            STR_PAD_LEFT
        );
    }

    protected static $serialSection = 'items';

    protected $table = 'warehousing_place_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'place_id',
        'product_id',
        'serial_number',
        'quantity',
        'type',
        'status',
    ];

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'id', 'place_id');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function logs()
    {
        return $this->hasMany(PlaceItemLog::class, 'record_source', 'id');
    }

    public function bundleSerials()
    {
        return $this->hasMany(TransferBundleSerial::class, 'item_id', 'id');
    }
}
