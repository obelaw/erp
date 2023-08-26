<?php

return new class
{
    public function navbar()
    {
        return [
            [
                'icon' => 'home-2',
                'label' => 'Home',
                'href' => 'obelaw.accounting.home'
            ],
            [
                'icon' => 'chart-bar',
                'label' => 'Chart Of Accounts',
                'href' => 'obelaw.accounting.coa.index'
            ],
            [
                'icon' => 'list',
                'label' => 'Entries',
                'href' => 'obelaw.accounting.entries.index'
            ],
            [
                'icon' => 'receipt-2',
                'label' => 'Price List',
                'href' => 'obelaw.accounting.price_list.index'
            ],
        ];
    }
};
