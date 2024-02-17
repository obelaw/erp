<?php

namespace Obelaw\Purchasing\Livewire\Vendors\Views;

use Livewire\Component;

class VendorInfoView extends Component
{
    public function mount($vendor)
    {
        $this->vendor = $vendor;
    }

    public function render()
    {
        return <<<'BLADE'
            <div>
                <div class="row">
                    <div class="col-9">
                        <div class="datagrid-item">
                            <div class="datagrid-title">Name</div>
                            <div class="datagrid-content">{{ $this->vendor->name }}</div>
                        </div>
                        <div class="datagrid-item mt-3">
                            <div class="datagrid-title">Phone</div>
                            <div class="datagrid-content">{{ $this->vendor->phone ?? '-' }}</div>
                        </div>
                        <div class="datagrid-item mt-3">
                            <div class="datagrid-title">Email</div>
                            <div class="datagrid-content">{{ $this->vendor->email }}</div>
                        </div>
                        <div class="datagrid-item mt-3">
                            <div class="datagrid-title">Website</div>
                            <div class="datagrid-content">{{ $this->vendor->website ?? '-' }}</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="text-center">
                            <span class="avatar avatar-xl mb-3 rounded">{{ substr($this->vendor->name, 0, 2) }}</span>
                            <h3 class="m-0 mb-1"><a href="#">{{ $this->vendor->name }}</a></h3>
                            <div class="text-secondary">{{ $this->vendor->mobile }}</div>
                        </div>
                    </div>
                </div>
            </div>
        BLADE;
    }
}
