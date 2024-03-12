<?php

use Obelaw\Accounting\database\Seeders\AccountEntrySeeder;
use Obelaw\Accounting\database\Seeders\AccountSeeder;
use Obelaw\Schema\Seed\Seed;

return new class
{
    public function seeds(Seed $seed)
    {
        $seed->seedClass(AccountSeeder::class);
        $seed->seedClass(AccountEntrySeeder::class);
    }
};
