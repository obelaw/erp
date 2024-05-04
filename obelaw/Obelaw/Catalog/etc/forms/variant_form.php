<?php

use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Product Type',
            'model' => 'product_type',
            'options' => [
                [
                    'label' => 'Consumable',
                    'value' => 1,
                ],
                [
                    'label' => 'Service',
                    'value' => 2,
                ],
                [
                    'label' => 'Storable Product',
                    'value' => 3,
                ],
            ],
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Unit Measure',
            'model' => 'unit_measure',
            'options' => [
                [
                    'label' => 'mm',
                    'value' => 1,
                ],
                [
                    'label' => 'g',
                    'value' => 2,
                ],
                [
                    'label' => 'cm',
                    'value' => 3,
                ],
            ],
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Description',
            'model' => 'description',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Cost',
            'model' => 'cost',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 50,
        ]);
    }
};
