<?php

namespace Obelaw\ERP\Addons\Accounting\Lib\Services;

use Obelaw\ERP\Addons\Accounting\Models\Pricelist;
use Obelaw\ERP\Addons\Catalog\Models\Product;
use Obelaw\ERP\Base\BaseService;

class PricelistService extends BaseService
{
    private array|null $pricelistItem = null;

    public function setPricelistId($id = null)
    {
        if (!$id) {
            $this->pricelistItem = [];

            return $this;
        }

        $pricelist = Pricelist::find($id);

        return $this->pricelist($pricelist);
    }

    public function pricelist(Pricelist $pricelist)
    {
        $this->pricelist = $pricelist;

        if (!$this->pricelistItem)
            $this->pricelistItem = $pricelist->items()->pluck('price', 'product_id')->toArray();

        return $this;
    }

    public function getProductPrice(Product $product)
    {
        return $this->pricelistItem[$product->id] ?? $product->price_sales ?? 0;
    }
}
