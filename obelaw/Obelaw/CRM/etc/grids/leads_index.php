<?php

use Obelaw\CRM\Models\Lead;
use Obelaw\Schema\Grid\Button\RouteAction;
use Obelaw\Schema\Grid\Button;
use Obelaw\Schema\Grid\CTA;
use Obelaw\Schema\Grid\Table;

return new class
{
    public $model = Lead::class;

    public function createButton(Button $button)
    {
        $button->setButton(
            label: 'Create New Lead',
            route: 'obelaw.crm.leads.create',
            permission: 'crm_leads_create',
        );
    }

    public function table(Table $table)
    {
        $table->setColumn('#', 'id');
    }

    public function CTA(CTA $CTA)
    {
        // 
    }
};
