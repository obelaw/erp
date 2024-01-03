<?php

use Obelaw\Catalog\Models\Catagory;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Catagory::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create new Category',
            route: 'obelaw.catalog.categories.create',
            permission: 'catalog_categories_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('obelaw-warehouse::grids.name', 'name');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.catalog.categories.update',
            permission: 'catalog_categories_update',
        ));
    }
};
