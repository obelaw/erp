<?php

namespace Obelaw\Warehouse\Livewire\Bundles;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Warehouse\Enums\TransferBundleStatus;

#[Access('warehouse_transfer_listing')]
class IndexBundlesComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_bundles_index';

    protected $pretitle = 'Bundles';
    protected $title = 'Bundles listing';

    public function status($value)
    {
        return TransferBundleStatus::status($value);
    }
}
