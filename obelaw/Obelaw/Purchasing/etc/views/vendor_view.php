<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Vendor info', 'obelaw-purchasing-vendors-show-info');
        $tab->addTab('Vendor payments', 'obelaw-purchasing-vendors-show-payments');
        // $tab->addTab('Vendor cheques', 'obelaw-accounting-vendor-show-cheques');
    }
};
