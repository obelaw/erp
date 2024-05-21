<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Warehouse\Models\Place\Warehouse;

#[Access('warehouse_warehouses_index')]
class IndexWarehousesComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_warehouse_warehouses_index';

    protected $pretitle = 'Warehouses';
    protected $title = 'Warehouses listing';

    #[Access('warehouse_warehouses_remove')]
    public function removeRow(Warehouse $warehouse)
    {
        if ($warehouse->places->count() != 0) {
            return $this->pushAlert('error', 'You cannot delete this warehouse');
        }

        $warehouse->delete();
        return $this->pushAlert('success', 'The warehouse has been deleted');
    }
}
