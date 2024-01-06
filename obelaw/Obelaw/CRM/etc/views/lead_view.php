<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Lead info', 'obelaw-crm-lead-view-info');
        $tab->addTab('Lead info 2', 'obelaw-crm-lead-view-info');
        // $tab->addTab('Journal entries', 'obelaw-accounting-coa-show-journal-entrie');
    }
};
