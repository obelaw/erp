<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Warehouse\Enums\TransferStatus;

#[Access('warehouse_transfer_listing')]
class IndexTransfersComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_transfers_index';

    protected $pretitle = 'Transfers';
    protected $title = 'Transfers listing';

    public function status($value)
    {
        return TransferStatus::status($value);
    }
}
