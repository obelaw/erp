<?php

use Obelaw\UI\Schema\Widgets\Widgets;

// return [
//     [
//         'component' => 'obelaw-accounting-count-aoc-widget',
//         'cols' => 'col-sm-6 col-lg-3'
//     ],
//     [
//         'component' => 'obelaw-accounting-count-aoc-widget',
//         'cols' => 'col-sm-6 col-lg-4'
//     ],
// ];

return new class
{
    public $id = 'accounting-widgets';

    public function widgets(Widgets $widgets)
    {
        $widgets->addWidget(
            component: 'obelaw-accounting-count-aoc-widget',
            cols: 'col-sm-12 col-lg-4'
        );

        $widgets->addWidget(
            component: 'obelaw-accounting-profit-widget',
            cols: 'col-sm-12 col-lg-4'
        );

        $widgets->addWidget(
            component: 'obelaw-accounting-count-price-list-widget',
            cols: 'col-sm-12 col-lg-4'
        );

        $widgets->addWidget(
            component: 'obelaw-accounting-draft-invoices-widget',
            cols: 'col-sm-12 col-lg-12'
        );
    }
};
