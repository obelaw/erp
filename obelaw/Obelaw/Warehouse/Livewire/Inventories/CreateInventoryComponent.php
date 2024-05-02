<?php

namespace Obelaw\Warehouse\Livewire\Inventories;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Enums\PlaceType;
use Obelaw\Warehouse\Models\Place\Inventory;

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

        $validateData['record_type'] = PlaceType::INVENTORY;

        $created = Inventory::create($validateData);

        if ($created)
            return $this->pushAlert('success', 'This inventory has been created');
    }
}
