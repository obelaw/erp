<?php

namespace Obelaw\Manufacturing\Livewire\Products;

use Obelaw\UI\Permissions\Access;
use Obelaw\UI\Renderer\GridRender;
use Obelaw\Framework\Base\Traits\PushAlert;
use Obelaw\Manufacturing\Models\Product;

#[Access('manufacturing_products_index')]
class IndexProductsComponent extends GridRender
{
    use PushAlert;

    public $gridId = 'obelaw_manufacturing_products_index';

    protected $pretitle = 'Products';
    protected $title = 'Products listing';

    #[Access('manufacturing_products_remove')]
    public function removeRow(Product $product)
    {
        $product->delete();

        return $this->pushAlert('success', 'The product has been deleted');
    }
}
