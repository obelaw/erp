<?php

namespace Obelaw\Accounting\database\Seeders;

use Illuminate\Database\Seeder;
use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Accounting\Model\Account;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Account::count() == 0) {
            foreach (AccountType::getTypes() as $type) {
                Account::create([
                    'name' => $type['label'],
                    'code' => $type['key'],
                    'type' => $type['key'],
                ]);
            }
        }
    }
}
