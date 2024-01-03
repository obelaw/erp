<?php

namespace Obelaw\Catalog\Livewire\Products;

use Obelaw\Catalog\Models\Product;
use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Framework\Base\Traits\PushAlert;

#[Access('catalog_products_update')]
class ProductUpdateComponent extends FormRender
{
    use PushAlert;

    public $formId = 'obelaw_catalog_products_form';

    public $product;

    public function mount(Product $product)
    {
        $this->catagory_id = $product->catagory_id;
        $this->product_type = $product->product_type;
        $this->name = $product->name;
        $this->sku = $product->sku;
        $this->can = [
            'sold' => $product->can_sold,
            'purchased' => $product->can_purchased,
        ];
        $this->in_pos = $product->in_pos;
        $this->product = $product;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $validateData['can_sold'] = $validateData['can']['sold'] ?? null;
        $validateData['can_purchased'] = $validateData['can']['purchased'] ?? null;

        $this->product->update($validateData);
        $this->pushAlert('success', 'Updated!');
    }
}
