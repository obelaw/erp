<?php

namespace Obelaw\Warehouse\Livewire\Adjustments;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Models\Adjustment;

#[Access('warehouse_adjustments_create')]
class AdjustmentsCreateComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_warehouse_adjustments_form';

    protected $pretitle = 'Adjustments';
    protected $title = 'Create new adjustment';

    public function submit()
    {
        $validateData = $this->validate();

        $adjustment = Adjustment::create($validateData);

        $adjustment->transfer()->create([
            'inventory_to' => $validateData['inventory_id'],
            'product_id' => $validateData['product_id'],
            'quantity' => $validateData['quantity'],
            'description' => $validateData['description'],
        ]);

        for ($x = 1; $x <= $validateData['quantity']; $x++) {
            $adjustment->inventoryItem()->create([
                'inventory_id' => $validateData['inventory_id'],
                'product_id' => $validateData['product_id'],
                'status' => 'stock',
            ]);
        }

        $this->pushAlert(
            type: 'success',
            massage: 'The adjustment has been created'
        );
    }
}
