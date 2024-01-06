<?php

use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Manufacturing\Models\Plan;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Plan::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Plan',
            route: 'obelaw.manufacturing.planning.create',
            permission: 'manufacturing_planning_create'
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Reference', 'serial')
            ->setColumn('Name', 'name')
            ->setColumn('Start At', 'start_at')
            ->setColumn('Start At', 'end_at');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Detail', new RouteAction(
            color: 'info',
            href: 'obelaw.manufacturing.planning.detail',
            permission: 'manufacturing_planning_detail',
        ));

        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.manufacturing.planning.update',
            permission: 'manufacturing_planning_update',
        ));
    }
};
