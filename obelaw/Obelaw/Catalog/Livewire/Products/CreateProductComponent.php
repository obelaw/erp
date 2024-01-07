<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_products_create')]
class CreateProductComponent extends FormRender
{
    public $formId = 'obelaw_catalog_products_form';

    public function submit()
    {
        $validateData = $this->getInputs();

        $validateData['can_sold'] = $validateData['can']['sold'] ?? null;
        $validateData['can_purchased'] = $validateData['can']['purchased'] ?? null;

        unset($validateData['can']);

        Product::create($validateData);
    }
}
