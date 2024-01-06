<?php

namespace Obelaw\Manufacturing\Livewire\Products;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\FormRender;
use Obelaw\Manufacturing\Models\Product;
use Obelaw\Manufacturing\Views\Layout;

#[Access('manufacturing_products_create')]
class CreateProductComponent extends FormRender
{
    public $formId = 'obelaw_manufacturing_products_form';

    protected $pretitle = 'Products';
    protected $title = 'Create New Product';

    public function layout()
    {
        return Layout::class;
    }

    public function submit()
    {
        $validateData = $this->validate();

        Product::create($validateData);

        return $this->pushAlert('success', 'The product has been created');
    }
}
