<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Vendor info', 'obelaw-accounting-vendor-show-info');
        $tab->addTab('Vendor payments', 'obelaw-accounting-vendor-show-payments');
        $tab->addTab('Vendor cheques', 'obelaw-accounting-vendor-show-cheques');
    }
};
