<?php

namespace Obelaw\Sales\Classes\Singleton;

use Obelaw\Configs\Classes\ConfigsClass;
use Obelaw\Sales\Models\Customer;

class CustomerManagement
{
    public function __construct(public ConfigsClass $configs)
    {
    }

    public function getARJournalAccount(int $customerId = null): int|null
    {
        $customer = Customer::with(['journal'])->find($customerId);

        if ($customer?->journal) {
            return $customer->journal->account_receivable;
        }

        return $this->configs->get('obelaw.erp.sales.customers.default.account.receivable');
    }
}
