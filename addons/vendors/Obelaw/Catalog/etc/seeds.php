<?php

use Obelaw\Catalog\database\Seeders\ProductsSeeder;
use Obelaw\UI\Schema\Seed\Seed;

return new class
{
    public function seeds(Seed $seed)
    {
        $seed->seedClass(ProductsSeeder::class);
    }
};
