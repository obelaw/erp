<?php

use Obelaw\Framework\Builder\Build\View\Tabs;

return new class
{
    public function tabs(Tabs $tab)
    {
        $tab->addTab('Entry info', 'obelaw-accounting-entry-show-info');
    }
};
