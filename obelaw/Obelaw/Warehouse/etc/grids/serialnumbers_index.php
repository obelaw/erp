<?php

use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;
use Obelaw\Warehouse\Builder\InventoryItemWhere;
use Obelaw\Warehouse\Filters\SerialNumbersGridFilter;
use Obelaw\Warehouse\Models\InventoryItem;
use Obelaw\Warehouse\Models\PlaceItem;

return new class
{
    public $model = PlaceItem::class;

    public $where = InventoryItemWhere::class;

    public $filter = SerialNumbersGridFilter::class;

    // public function createBottom(Bottom $bottom)
    // {
    //     $bottom->setBottom('Create new inventory', 'obelaw.warehouse.inventories.create');
    // }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Serial', 'serial')
            ->setColumn('ULID', 'ulid')
            ->setColumn('Barcode', 'barcode');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Detail', new RouteAction(
            color: 'info',
            href: 'obelaw.warehouse.serial-numbers.detail',
            permission: 'warehouse_serial_numbers_detail',
        ));
    }
};
