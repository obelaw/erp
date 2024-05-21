<?php

namespace Obelaw\Purchasing\Livewire\Vendors;

use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('purchasing_vendors_index')]
class IndexVendorsComponent extends GridRender
{
    public $gridId = 'obelaw_purchasing_vendors_index';

    protected $pretitle = 'Vendors';
    protected $title = 'Vendors listing';
}
