<?php

namespace Obelaw\Purchasing\Models;

use Basketin\Component\Cart\Contracts\IQuote;
use Basketin\Component\Cart\Traits\HasQuote;
use Basketin\Component\Cart\Traits\HasTotal;

class Product extends \Obelaw\Catalog\Models\Product implements IQuote
{
    use HasQuote;
    use HasTotal;

    public function getOriginalPriceAttribute(): float
    {
        return (float) $this->price_purchase ?? 0;
    }

    public function getSpecialPriceAttribute(): float|null
    {
        return null;
    }
}
