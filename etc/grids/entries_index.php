<?php

use Obelaw\Accounting\Model\AccountEntry;
use Obelaw\Framework\Builder\Build\Grid\{
    CTA,
    Table,
    Bottom
};

return new class
{
    public function model()
    {
        return AccountEntry::class;
    }

    public function createBottom(Bottom $bottom)
    {
        $bottom->setBottom('Create new entry', 'obelaw.accounting.entries.create');
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Total', 'total')
            ->setColumn('Added on', 'added_on');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Show', [
            'type' => 'route',
            'color' => 'primary',
            'route' => 'obelaw.accounting.entries.show',
        ]);
    }
};
