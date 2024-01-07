<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Inventory;

#[Access('warehouse_inventories_create')]
class CreateInventoryComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_warehouse_inventories_form';

    protected $pretitle = 'Inventories';
    protected $title = 'Create new inventorie';

    public function submit()
    {
        $validateData = $this->getInputs();

        if (Inventory::whereCode($validateData['code'])->first()) {
            return $this->pushAlert('error', 'This inventory exists');
        }

        $validateData['has_products'] = $validateData['has']['products'] ?? null;
        $validateData['has_variants'] = $validateData['has']['variants'] ?? null;

        Inventory::create($validateData);

        return $this->pushAlert('success', 'This inventory has been created');
    }
}
