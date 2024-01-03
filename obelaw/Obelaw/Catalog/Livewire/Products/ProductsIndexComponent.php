<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('catalog_products_index')]
class ProductsIndexComponent extends GridRender
{
    public $gridId = 'obelaw_catalog_products_index';

    public function submit()
    {
        $validateData = $this->validate();

        Product::create($validateData);
    }
}
