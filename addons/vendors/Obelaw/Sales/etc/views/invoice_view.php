<?php

use Obelaw\UI\Schema\View\Button;
use Obelaw\UI\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Invoice', 'obelaw-sales-invoices-view-invoice');
        $tab->addTab('Statement', 'obelaw-sales-invoices-view-invoice-statement');
    }

    public function magicButtons(Button $button)
    {
        $button->setButton('obelaw-sales-sales-order-button-print');
        $button->setButton('obelaw-sales-invoices-button-post-invoice');
    }
};
