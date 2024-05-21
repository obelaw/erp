<?php

declare(strict_types=1);

namespace Obelaw\Accounting\Console;

use Illuminate\Console\Command;
use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Accounting\Model\Account;

final class AddAcountsCommand extends Command
{
    public function handle(): void
    {
        if (Account::count() == 0) {
            foreach (AccountType::getTypes() as $type) {
                Account::create([
                    'name' => $type['label'],
                    'code' => $type['key'],
                    'type' => $type['key'],
                ]);
            }

            $this->line('<fg=white;bg=blue> OBELAW CREATE CHART OF ACCOUNTS </>');
        } else {
            $this->line('<fg=black;bg=yellow> OBELAW HAS CHART OF ACCOUNTS </>');
        }
    }
}
