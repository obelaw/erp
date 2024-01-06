<?php

namespace Obelaw\Warehouse\Livewire\SerialNumbers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('warehouse_serial_numbers_index')]
class SerialNumbersIndexComponent extends GridRender
{
    public $gridId = 'obelaw_warehouse_serialnumbers_index';

    protected $pretitle = 'Serial numbers';
    protected $title = 'Serial numbers listing';
}
