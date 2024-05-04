<?php

use Obelaw\UI\Schema\Widgets\Widgets;

return new class
{
    public $id = 'catalog-widgets';

    public function widgets(Widgets $widgets)
    {
        $widgets->addWidget(
            component: 'obelaw-catalog-widgets-count-products-widget',
            cols: 'col-sm-12 col-lg-4'
        );
    }
};
