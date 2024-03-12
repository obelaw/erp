<?php

use Obelaw\Catalog\database\Seeders\ProductsSeeder;
use Obelaw\Schema\Seed\Seed;

return new class
{
    public function seeds(Seed $seed)
    {
        $seed->seedClass(ProductsSeeder::class);
    }
};
