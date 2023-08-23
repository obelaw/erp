<?php

use Obelaw\Framework\Builder\Build\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Add Item', 'obelaw-accounting-pricelist-additem');
        $tab->addTab('Items', 'obelaw-accounting-pricelist-showitems');
    }
};
