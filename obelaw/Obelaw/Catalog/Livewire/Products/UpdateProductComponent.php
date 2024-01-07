<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Framework\Base\Traits\PushAlert;

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
            'in_pos' => ($product->in_pos) ? true : false,
        ]);
    }

    public function submit()
    {
        $validateData = $this->getInputs();

        $validateData['can_sold'] = $validateData['can']['sold'] ?? null;
        $validateData['can_purchased'] = $validateData['can']['purchased'] ?? null;

        $this->product->update($validateData);
        $this->pushAlert('success', 'Updated!');
    }
}
