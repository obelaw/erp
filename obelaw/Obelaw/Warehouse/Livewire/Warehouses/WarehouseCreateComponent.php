<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Warehouse;

#[Access('warehouse_warehouses_create')]
class WarehouseCreateComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_warehouse_warehouses_form';

    protected $pretitle = 'Warehouses';
    protected $title = 'Create new warehouse';

    public function submit()
    {
        $validateData = $this->validate();

        if (Warehouse::whereCode($validateData['code'])->first()) {
            return $this->pushAlert('error', 'This warehouse exists');
        }

        Warehouse::create($validateData);

        return $this->pushAlert('success', 'This warehouse has been created');
    }
}
