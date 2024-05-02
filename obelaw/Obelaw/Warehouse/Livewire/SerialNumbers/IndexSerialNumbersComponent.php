<?php

namespace Obelaw\Warehouse\Livewire\SerialNumbers;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('warehouse_serial_numbers_index')]
class IndexSerialNumbersComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_serialnumbers_index';

    protected $pretitle = 'Serial numbers';
    protected $title = 'Serial numbers listing';
}
