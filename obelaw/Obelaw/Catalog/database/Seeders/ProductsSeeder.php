<?php

namespace Obelaw\Catalog\database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Obelaw\Catalog\Enums\ProductType;
use Obelaw\Catalog\Lib\DTOs\InitProductDTO;
use Obelaw\Catalog\Support\Facades\Products;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 50) as $index) {
            Products::create(new InitProductDTO(
                catagory_id: null,
                product_type: $faker->randomElement([1, 2, 3]),
                name: $faker->name(),
                sku: $faker->ean8(),
                can_sold: $faker->randomElement([true, false]),
                can_purchased: $faker->randomElement([true, false]),
                price_sales: $faker->numberBetween(100, 10000),
                price_purchase: null,
            ));
        }
    }
}
