<?php

namespace Obelaw\Sales\Utilities;

class VirtualCheckoutManagement
{
    protected $id = null;
    protected $cart = null;

    public function cartId($id)
    {
        $this->cart = new \SleekDB\Store($id, storage_path('framework/cache/cart'));

        return $this;
    }

    public function addItem(string $name, string $sku, float $price, int $quantity = 1)
    {
        $article = [
            'name' => $name,
            'sku' => $sku,
            'quantity' => $quantity,
            'price' => $price,
        ];

        if ($item = $this->cart->findOneBy(['sku', '=', $sku])) {
            return $this->cart->updateById($item['_id'], ['quantity' => $item['quantity'] + $quantity]);
        }

        return $this->cart->insert($article);
    }

    public function increase(int $id, int $quantity = 1)
    {
        if ($item = $this->cart->findById($id)) {
            $this->cart->updateById($id, ['quantity' => $item['quantity'] + $quantity]);
        }
    }

    public function decrease(int $id, int $quantity = 1)
    {
        if ($item = $this->cart->findById($id)) {
            if ($item['quantity'] <= 1) {
                $this->cart->deleteById($id);
                return false;
            }

            $this->cart->updateById($id, ['quantity' => $item['quantity'] - $quantity]);
        }
    }

    public function getItems()
    {
        return $this->cart->findAll();
    }

    public function subTotal()
    {
        $collection = collect($this->getItems());

        return $collection->sum(function (array $item) {
            return $item['quantity'] * $item['price'];
        });
    }
}
