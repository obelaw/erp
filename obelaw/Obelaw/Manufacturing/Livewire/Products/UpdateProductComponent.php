<?php

namespace Obelaw\Manufacturing\Livewire\Products;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Models\Product;

#[Access('manufacturing_products_update')]
class UpdateProductComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_products_form';

    public $product = null;

    protected $pretitle = 'Products';
    protected $title = 'Update This Product';

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->product_type = $product->product_type;
        $this->name = $product->name;
        $this->description = $product->description;
    }

    public function submit()
    {
        $validateData = $this->validate();

        $this->product->create($validateData);

        return $this->pushAlert('success', 'The product has been created');
    }
}
