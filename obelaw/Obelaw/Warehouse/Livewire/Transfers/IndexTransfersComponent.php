<?php

namespace Obelaw\Warehouse\Livewire\Transfers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('warehouse_transfer_listing')]
class IndexTransfersComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_transfers_index';

    protected $pretitle = 'Transfers';
    protected $title = 'Transfers listing';
}
