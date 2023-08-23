<?php

use Obelaw\Accounting\Model\PriceList;
use Obelaw\Framework\Builder\Build\Grid\{
    CTA,
    Table,
    Bottom
};

return new class
{
    public function model()
    {
        return PriceList::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new list', 'obelaw.accounting.price_list.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Code', 'code')
            ->setColumn('Start date', 'start_date')
            ->setColumn('End date', 'end_date');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Items', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'obelaw.accounting.price_list.items',
        ]);

        $CTA->setCall('Update', [
            'type' => 'route',
            'color' => 'info',
            'route' => 'obelaw.accounting.price_list.update',
        ]);
    }
};
