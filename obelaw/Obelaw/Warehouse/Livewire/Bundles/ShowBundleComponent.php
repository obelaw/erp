<?php

namespace Obelaw\Warehouse\Livewire\Bundles;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\ViewRender;
use Obelaw\Warehouse\Models\TransferBundle;

#[Access('warehouse_transfer_show')]
class ShowBundleComponent extends ViewRender
{
    public $viewId = 'obelaw_warehouse_transfers_bundles_view';

    protected $pretitle = 'Bundles';
    protected $title = 'Bundle Show';

    public function mount(TransferBundle $bundle)
    {
        $this->parameters(['bundle' => $bundle]);
    }
}
