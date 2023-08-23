<?php

use Obelaw\Framework\Builder\Build\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Account info', 'obelaw-accounting-coa-show-account-info');
        $tab->addTab('Journal entries', 'obelaw-accounting-coa-show-journal-entrie');
    }
};
