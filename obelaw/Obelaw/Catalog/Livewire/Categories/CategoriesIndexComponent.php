<?php

namespace Obelaw\Catalog\Livewire\Categories;

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;

#[Access('catalog_categories_index')]
class CategoriesIndexComponent extends GridRender
{
    public $gridId = 'obelaw_catalog_categories_index';

    public function submit()
    {
        $validateData = $this->validate();

        Product::create($validateData);
    }
}
