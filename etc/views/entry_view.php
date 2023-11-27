<?php

use Obelaw\Schema\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Entry info', 'obelaw-accounting-entry-show-info');
    }
};
