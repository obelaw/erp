<?php

use Obelaw\UI\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Transfer Info', 'obelaw-warehouses-transfers-view-transfer-info');
        $tab->addTab('Transfer Items', 'obelaw-warehouses-transfers-view-transfer-items');
        $tab->addTab('Transfer Bundles', 'obelaw-warehouses-transfers-view-transfer-bundles');
    }
};
