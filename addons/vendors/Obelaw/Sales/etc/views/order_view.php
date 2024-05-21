<?php

use Obelaw\UI\Schema\View\Button;
use Obelaw\UI\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Order info', 'obelaw-sales-sales-order-view-info');
        // $tab->addTab('Journal entries', 'obelaw-accounting-coa-show-journal-entrie');
    }

    public function magicButtons(Button $button)
    {
        $button->setButton('obelaw-sales-sales-order-button-print');
        $button->setButton('obelaw-sales-sales-order-button-invoice');
    }
};
