<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\ViewRender;
use Obelaw\Warehouse\Models\Transfer;

#[Access('warehouse_transfer_show')]
class ShowTransferComponent extends ViewRender
{
    public $vendor = null;
    public $viewId = 'obelaw_warehouse_transfers_view';

    protected $pretitle = 'Transfers';
    protected $title = 'Transfer Show';

    public function mount(Transfer $transfer)
    {
        $this->parameters(['transfer' => $transfer]);
    }
}
