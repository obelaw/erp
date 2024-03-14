<?php

namespace Obelaw\Warehouse\Livewire\Bundles;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Warehouse\Enums\TransferStatus;

#[Access('warehouse_transfer_listing')]
class IndexBundlesComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_bundles_index';

    protected $pretitle = 'Bundles';
    protected $title = 'Bundles listing';

    public function status($value)
    {
        return TransferStatus::status($value);
    }
}
