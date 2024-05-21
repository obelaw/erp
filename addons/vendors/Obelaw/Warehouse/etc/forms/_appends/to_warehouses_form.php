<?php

use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public $appendTo = 'obelaw_warehouse_warehouses_form';

    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXT, [
            'label' => 'Quantity',
            'model' => 'quantity',
            'rules' => 'required|integer|min:1',
            // 'placeholder' => 'IPhone x6',
            'order' => 50,
        ]);
    }
};
