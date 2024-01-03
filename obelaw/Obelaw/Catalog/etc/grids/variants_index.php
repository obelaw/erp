<?php

use Obelaw\Catalog\Models\Variant;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Variant::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Variant',
            route: 'obelaw.catalog.variants.create',
            permission: 'catalog_variants_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id')
            ->setColumn('Reference', 'serial')
            ->setColumn('Name', 'name')
            ->setColumn('Cost', 'cost');
    }

    public function CTA(CTA $CTA)
    {
        $CTA->setCall('Update', new RouteAction(
            href: 'obelaw.catalog.variants.update',
            permission: 'catalog_variants_update',
        ));
    }
};
