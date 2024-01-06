<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Warehouse\Models\Inventory;

#[Access('warehouse_inventories_index')]
class InventoriesIndexComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_warehouse_inventories_index';

    protected $pretitle = 'Inventories';
    protected $title = 'Inventories listing';

    #[Access('warehouse_inventories_remove')]
    public function removeRow(Inventory $inventory)
    {
        if ($inventory->items->count() != 0) {
            return $this->pushAlert('error', 'You cannot delete this inventory');
        }

        $inventory->delete();
        return $this->pushAlert('success', 'The inventory has been deleted');
    }
}
