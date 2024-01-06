<?php

use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Manufacturing\Models\Worker;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Worker::class;


    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Worker',
            route: 'obelaw.manufacturing.workers.create',
            permission: 'manufacturing_workers_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Name', 'name')
            ->setColumn('Job Position', 'job_position')
            ->setColumn('Employee Code', 'employee_code');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            color: 'info',
            href: 'obelaw.manufacturing.workers.update',
            permission: 'manufacturing_workers_update',
        ));
    }
};
