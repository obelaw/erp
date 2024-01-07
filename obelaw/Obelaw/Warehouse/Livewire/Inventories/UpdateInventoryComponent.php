<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Inventory;

#[Access('warehouse_inventories_update')]
class UpdateInventoryComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_inventories_form';

    public $inventory = null;

    protected $pretitle = 'Inventories';
    protected $title = 'Update the inventorie';

    public function mount(Inventory $inventory)
    {
        $this->inventory = $inventory;

        $this->setInputs([
            'warehouse_id' => $inventory->warehouse_id,
            'name' => $inventory->name,
            'code' => $inventory->code,
            'description' => $inventory->description,
            'address' => $inventory->address,
            'has' => [
                'products' => ($inventory->has_products) ? true : false,
                'variants' => ($inventory->has_variants) ? true : false,
            ],
        ]);
    }

    public function submit()
    {
        $validateData = $this->validate();

        $validateData['has_products'] = $validateData['has']['products'] ?? null;
        $validateData['has_variants'] = $validateData['has']['variants'] ?? null;

        $this->inventory->update($validateData);
    }
}
