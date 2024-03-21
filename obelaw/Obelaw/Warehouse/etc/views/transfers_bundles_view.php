<?php

use Obelaw\Schema\View\Button;
use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Bundle Info', 'obelaw-warehouses-transfers-view-bundles-info');
        $tab->addTab('Bundle serials', 'obelaw-warehouses-transfers-view-bundles-serials');
    }

    public function magicButtons(Button $button)
    {
        $button->setButton('obelaw-warehouses-transfers-view-transfer-close-bundle');
    }
};
