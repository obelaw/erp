<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Lib\DTOs\Adjustment\InitTransferDTO;
use Obelaw\Warehouse\Models\Transfer;

#[Access('warehouse_transfer_create')]
class CreateTransferSerialsComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_transfers_serials_form';

    protected $pretitle = 'Transfers';
    protected $title = 'Create new transfer';

    public $transfer = null;

    public function mount(Transfer $transfer)
    {
        $this->transfer = $transfer;

        $serials = $this->transfer->inventoryFrom->items->take($transfer->quantity)->map(function ($item) {
            return $item->barcode;
        })->toArray();

        $_serials = '';

        foreach ($serials as $serial) {
            $_serials .= $serial . "\n";
        }

        // dd($this->transfer->inventoryFrom->items()->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', '3531108547527024'))->first());

        $this->setInputs([
            'serials' => $_serials,
        ]);

        app('obelaw.warehouse.auditstock')->NonOwnedSeries($this->transfer->inventory_from, $serials);
    }

    public function submit()
    {
        $inputs = $this->getInputs();

        $serials = explode("\n", $inputs['serials']);

        // foreach ($serials as $serial) {
        //     if (!$this->transfer->inventoryFrom->items()->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', $serial))->first()) {
        //         dd($serial);
        //     }
        // }

        // foreach ($serials as $serial) {
        //     if ($item = $this->transfer->inventoryFrom->items()->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', $serial))->first()) {
        //         $item->place_id = $this->transfer->inventory_to;
        //         $item->save();
        //     }
        // }

        // $nonOwnedSeries = app('obelaw.warehouse.auditstock')->NonOwnedSeries($this->transfer->inventory_from, $serials);

        // if (!empty($nonOwnedSeries)) {
        //     dd($nonOwnedSeries);
        // }

        app('obelaw.warehouse.transfer')->transferSerials($this->transfer->inventory_from, $this->transfer->inventory_to, $serials);

        dd(explode("\n", $inputs['serials']));
    }
}
