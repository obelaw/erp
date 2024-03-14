<?php

namespace Obelaw\Warehouse\Livewire\Bundles\Views;

use Livewire\Component;
use Obelaw\Warehouse\Enums\TransferBundleSerialStatus;
use Obelaw\Warehouse\Models\TransferBundleSerial;

class BundleSerialsView extends Component
{
    public $bundle = null;

    public function mount($bundle)
    {
        $this->bundle = $bundle;

        // dd($this->bundle->serials);
    }

    public function approval(TransferBundleSerial $serial)
    {
        $serial->status = TransferBundleSerialStatus::APPROVAL();
        $serial->item->place_id = $serial->bundle->transfer->inventory_to;
        $serial->push();
    }

    public function Rejected(TransferBundleSerial $serial)
    {
        $serial->status = TransferBundleSerialStatus::REJECTED();
        $serial->save();
    }

    public function BackPending(TransferBundleSerial $serial)
    {
        $serial->status = TransferBundleSerialStatus::PENDING();
        $serial->item->place_id = $serial->bundle->transfer->inventory_from;
        $serial->push();
    }

    public function render()
    {
        return <<<'BLADE'
            <div class="card">
                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>Barcode</th>
                                <th class="w-25"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($this->bundle->serials as $serial)
                                <tr>
                                    <td>
                                        {{ $serial->item->barcode }}
                                    </td>
                                    <td class="text-end">
                                        @if ($serial->status == \Obelaw\Warehouse\Enums\TransferBundleSerialStatus::PENDING())
                                            <button wire:click="approval({{ $serial }})" class="btn btn-sm btn-success">Approval</button>
                                        @endif

                                        @if ($serial->status == \Obelaw\Warehouse\Enums\TransferBundleSerialStatus::PENDING())
                                            <button wire:click="Rejected({{ $serial }})" class="btn btn-sm btn-danger">Rejected</button>
                                        @endif

                                        @if (in_array($serial->status, [\Obelaw\Warehouse\Enums\TransferBundleSerialStatus::APPROVAL(), \Obelaw\Warehouse\Enums\TransferBundleSerialStatus::REJECTED()]))
                                            <button wire:click="BackPending({{ $serial }})" class="btn btn-sm btn-warning">Back Pending</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        BLADE;
    }
}
