<?php

namespace Obelaw\Warehouse\Livewire\Adjustments;

use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Facades\Adjustments;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitAdjustmentDTO;
use Obelaw\Warehouse\Models\Adjustment;

#[Access('warehouse_adjustments_create')]
class CreateAdjustmentComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_warehouse_adjustments_form';

    protected $pretitle = 'Adjustments';
    protected $title = 'Create new adjustment';

    public function submit()
    {
        $inputs = $this->getInputs();

        $adjustment = Adjustments::new(new InitAdjustmentDTO(
            place_id: $inputs['place_id'],
            product_id: $inputs['product_id'],
            quantity: $inputs['quantity'],
            description: $inputs['description'],
        ));

        $this->pushAlert('success', 'This adjustment has been created');
        return redirect()->route('obelaw.warehouse.adjustments.show', [$adjustment]);

        // $adjustment->transfer()->create([
        //     'inventory_to' => $validateData['inventory_id'],
        //     'product_id' => $validateData['product_id'],
        //     'quantity' => $validateData['quantity'],
        //     'description' => $validateData['description'],
        // ]);

        // for ($x = 1; $x <= $validateData['quantity']; $x++) {
        //     $adjustment->inventoryItem()->create([
        //         'inventory_id' => $validateData['inventory_id'],
        //         'product_id' => $validateData['product_id'],
        //         'status' => 'stock',
        //     ]);
        // }

        // $this->pushAlert(
        //     type: 'success',
        //     massage: 'The adjustment has been created'
        // );
    }
}
