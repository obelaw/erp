<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Lib\DTOs\InitProductDTO;
use Obelaw\Catalog\Models\Product;
use Obelaw\Catalog\Support\Facades\Products;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Permissions\Attributes\Access;
use Obelaw\UI\Renderer\FormRender;

#[Access('catalog_products_update')]
class UpdateProductComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_catalog_products_form';

    public $product;

    public function mount(Product $product)
    {
        $this->product = $product;

        $this->setInputs([
            'catagory_id' => $product->catagory_id,
            'product_type' => $product->product_type,
            'name' => $product->name,
            'sku' => $product->sku,
            'can' => [
                'sold' => ($product->can_sold) ? true : false,
                'purchased' => ($product->can_purchased) ? true : false,
            ],
            'prices' => [
                'sales' => $product->price_sales ?? 0,
                'purchase' => $product->price_purchase ?? 0,
            ],
        ]);
    }

    public function submit()
    {
        $inputs = $this->getInputs();

        Products::update($this->product->id, new InitProductDTO(
            catagory_id: $inputs['catagory_id'] ?? null,
            product_type: $inputs['product_type'],
            name: $inputs['name'],
            sku: $inputs['sku'],
            can_sold: $inputs['can']['sold'] ?? null,
            can_purchased: $inputs['can']['purchased'] ?? null,
            price_sales: ($inputs['prices']['sales'] != 0) ? $inputs['prices']['sales'] : null,
            price_purchase: ($inputs['prices']['purchase'] != 0) ? $inputs['prices']['purchase'] : null,
        ));

        $this->pushAlert('success', 'Updated!');
    }
}
