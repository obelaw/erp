<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Lib\DTOs\InitProductDTO;
use Obelaw\Catalog\Support\Facades\Products;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_products_create')]
class CreateProductComponent extends FormRender
{
    public $formId = 'obelaw_catalog_products_form';

    public function submit()
    {
        $inputs = $this->getInputs();

        Products::create(new InitProductDTO(
            catagory_id: $inputs['catagory_id'] ?? null,
            product_type: $inputs['product_type'],
            product_scope: $inputs['product_scope'],
            name: $inputs['name'],
            sku: $inputs['sku'],
            can_sold: $inputs['can']['sold'] ?? null,
            can_purchased: $inputs['can']['purchased'] ?? null,
            price_sales: $inputs['prices']['sales'] ?? null,
            price_purchase: $inputs['prices']['purchase'] ?? null,
        ));

        $this->pushAlert('success', 'Created!');
    }
}
