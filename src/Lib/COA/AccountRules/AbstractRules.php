<?php

namespace Obelaw\Accounting\Lib\COA\AccountRules;

abstract class AbstractRules
{
    public $actions = ['debit', 'credit'];

    public $canNegativeCount = true;
}
