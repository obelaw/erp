<?php

namespace Obelaw\Warehouse\Livewire\Warehouses;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Place;
use Obelaw\Warehouse\Models\Place\Warehouse;

#[Access('warehouse_warehouses_create')]
class CreateWarehouseComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_warehouse_warehouses_form';

    protected $pretitle = 'Warehouses';
    protected $title = 'Create new warehouse';

    public function submit()
    {
        $validateData = $this->getInputs();

        if (Warehouse::whereCode($validateData['code'])->first()) {
            return $this->pushAlert('error', 'This warehouse exists');
        }

        // $validateData[''] = PlaceType::WAREHOUSE;

        Warehouse::create($validateData);

        return $this->pushAlert('success', 'This warehouse has been created');
    }
}
