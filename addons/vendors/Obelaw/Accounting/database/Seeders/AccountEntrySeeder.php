<?php

namespace Obelaw\Accounting\database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Obelaw\Accounting\DTO\Entry\AmountEntryDTO;
use Obelaw\Accounting\DTO\Entry\CreateEntryDTO;
use Obelaw\Accounting\Facades\Entries;

class AccountEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $items = [
            [
                [
                    'type' => 'debit',
                    'account' => 1,
                    'amount' => 2000,
                ],
                [
                    'type' => 'credit',
                    'account' => 2,
                    'amount' => 1000,
                ],
                [
                    'type' => 'credit',
                    'account' => 3,
                    'amount' => 1000,
                ]
            ],
            [
                [
                    'type' => 'debit',
                    'account' => 4,
                    'amount' => 2000,
                ],
                [
                    'type' => 'credit',
                    'account' => 5,
                    'amount' => 1000,
                ],
                [
                    'type' => 'credit',
                    'account' => 6,
                    'amount' => 1000,
                ]
            ],
            [
                [
                    'type' => 'debit',
                    'account' => 7,
                    'amount' => 2000,
                ],
                [
                    'type' => 'credit',
                    'account' => 8,
                    'amount' => 1000,
                ],
                [
                    'type' => 'credit',
                    'account' => 9,
                    'amount' => 1000,
                ]
            ]
        ];

        foreach ($items as $_items) {
            $entry = Entries::create(new CreateEntryDTO(
                Carbon::now(),
                $faker->text(),
            ));
            foreach ($_items as $item) {
                if ($item['type'] == 'debit') {
                    Entries::debit(new AmountEntryDTO(
                        $entry,
                        $item['account'],
                        $item['amount']
                    ));
                }

                if ($item['type'] == 'credit') {
                    Entries::credit(new AmountEntryDTO(
                        $entry,
                        $item['account'],
                        $item['amount']
                    ));
                }
            }
        }
    }
}
