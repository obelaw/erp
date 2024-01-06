<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Inventory;

#[Access('warehouse_inventories_update')]
class InventoryUpdateComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_inventories_form';

    public $inventory = null;

    protected $pretitle = 'Inventories';
    protected $title = 'Update the inventorie';

    public function mount(Inventory $inventory)
    {
        $this->warehouse_id = $inventory->warehouse_id;
        $this->name = $inventory->name;
        $this->code = $inventory->code;
        $this->description = $inventory->description;
        $this->address = $inventory->address;
        $this->has = [
            'products' => $inventory->has_products,
            'variants' => $inventory->has_variants,
        ];

        $this->inventory = $inventory;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $validateData['has_products'] = $validateData['has']['products'] ?? null;
        $validateData['has_variants'] = $validateData['has']['variants'] ?? null;

        $this->inventory->update($validateData);
    }
}
