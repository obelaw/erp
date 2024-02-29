<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Models\Product;
use Obelaw\Framework\Utils\Currency;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('catalog_products_index')]
class IndexProductsComponent extends GridRender
{
    public $gridId = 'obelaw_catalog_products_index';

    public function submit()
    {
        $validateData = $this->validate();

        Product::create($validateData);
    }

    public function price($value, $record): string
    {
        return floatval($value) . ' ' . Currency::symbol();
    }
}
