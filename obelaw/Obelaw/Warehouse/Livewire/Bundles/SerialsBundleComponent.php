<?php

namespace Obelaw\Warehouse\Livewire\Bundles;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Warehouse\Enums\TransferBundleStatus;
use Obelaw\Warehouse\Models\PlaceItem;
use Obelaw\Warehouse\Models\TransferBundle;

#[Access('warehouse_transfer_create')]
class SerialsBundleComponent extends FormRender
{
    public $formId = 'obelaw_warehouse_transfers_serials_form';

    protected $pretitle = 'Transfers';
    protected $title = 'Create new transfer';

    public $bundle = null;

    public function mount(TransferBundle $bundle)
    {
        $this->bundle = $bundle;
        $this->transfer = $bundle->transfer;

        if ($this->bundle->status == TransferBundleStatus::DRAFT()) {
            $serials = $this->transfer->inventoryFrom?->items->take($bundle->item->quantity)->map(function ($item) {
                return $item->barcode;
            })->toArray() ?? [];

            $_serials = '';

            foreach ($serials as $serial) {
                $_serials .= $serial . "\n";
            }

            // dd($this->transfer->inventoryFrom->items()->whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', '3531108547527024'))->first());

            $this->setInputs([
                'serials' => $_serials,
            ]);
        } else {
            $this->setInputs([
                'serials' => 'The serial numbers have already been generated',
            ]);
        }
        // app('obelaw.warehouse.auditstock')->NonOwnedSeries($this->transfer->inventory_from, $serials);
    }

    public function submit()
    {
        if ($this->bundle->status == TransferBundleStatus::ASSIGNED())
            return $this->pushAlert('error', 'The serial numbers have already been generated');

        $inputs = $this->getInputs();

        $serials = explode("\n", $inputs['serials']);

        foreach ($serials as $serial) {
            $item = PlaceItem::whereHas('serialOne',  fn ($query) => $query->where('barcode', '=', $serial))->first();

            if ($item)
                if (!$item->bundleSerials()->where('bundle_id', $this->bundle->id)->first())
                    $item->bundleSerials()->create([
                        'bundle_id' => $this->bundle->id,
                    ]);
        }

        $this->bundle->status = TransferBundleStatus::ASSIGNED();
        $this->bundle->save();

        redirect()->route('obelaw.warehouse.transfer.bundles.show', [$this->bundle]);

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

        // app('obelaw.warehouse.transfer')->transferSerials($this->transfer->inventory_from, $this->transfer->inventory_to, $serials);



        // dd(explode("\n", $inputs['serials']));
    }
}
