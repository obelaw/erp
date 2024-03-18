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
                @if($this->bundle->serials->isNotEmpty())
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
                @else
                    <div class="empty">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-mood-empty" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path>
                                <path d="M9 10l.01 0"></path>
                                <path d="M15 10l.01 0"></path>
                                <path d="M9 15l6 0"></path>
                            </svg>
                        </div>
                        <p class="empty-title">No results found</p>
                        <p class="empty-subtitle text-secondary">
                            Try adjusting your search or filter or creating a new record to find a records.
                        </p>
                    </div>
                @endif
            </div>
        BLADE;
    }
}
