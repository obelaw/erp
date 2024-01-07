<?php

namespace Obelaw\Manufacturing\Livewire\Products;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Framework\Base\Traits\PushAlert;

#[Access('manufacturing_products_index')]
class IndexProductsComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_manufacturing_products_index';

    protected $pretitle = 'Products';
    protected $title = 'Products listing';
}
