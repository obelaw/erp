<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\ViewRender;
use Obelaw\Warehouse\Models\Inventory;

#[Access('warehouse_inventories_show')]
class InventoryShowComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_warehouse_inventory_view';

    protected $pretitle = 'Inventories';
    protected $title = 'Inventory show';

    public function mount(Inventory $inventory)
    {
        $this->parameters(['inventory' => $inventory]);
    }
}
