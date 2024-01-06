<?php

namespace Obelaw\Manufacturing\Livewire\Workers;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('manufacturing_workers_index')]
class IndexWorkersComponent extends GridRender
{
    public $gridId = 'obelaw_manufacturing_workers_index';

    protected $pretitle = 'Manufacturing Workers';
    protected $title = 'Workers Listing';
}
