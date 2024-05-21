<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitTransferDTO;

#[Access('warehouse_transfer_create')]
class CreateTransferComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_transfers_form';

    protected $pretitle = 'Transfers';
    protected $title = 'Create new transfer';

    public function submit()
    {
        $inputs = $this->getInputs();

        // dd($inputs);

        $transfer = app('obelaw.warehouse.transfer')->new(new InitTransferDTO(
            inventory_from: $inputs['inventory_from'],
            inventory_to: $inputs['inventory_to'],
            type: $inputs['type'],
            description: $inputs['description'] ?? null,
        ));

        return redirect()->route('obelaw.warehouse.transfer.manage', [$transfer]);

        // dd(explode("\n", $validateData['serials']));

        // if ($validateData['inventory_from'] == $validateData['inventory_to']) {
        //     $this->addError('inventory_from', 'You can not choose the same store');
        //     $this->addError('inventory_to', 'You can not choose the same store');

        //     return $this->psuhAlert(
        //         type: 'error',
        //         massage: 'You can not choose the same store'
        //     );
        // }

        // // if (Inventory::find($validateData['inventory_from'])->quantityAvailable($validateData['product_id']) < $validateData['quantity']) {
        // //     return $this->addError('quantity', 'A quantity not available in the inventory cannot be transferred');
        // // }

        // Transfer::create($validateData);

        // $this->psuhAlert(
        //     type: 'success',
        //     massage: 'The transfer has been created'
        // );
    }
}
