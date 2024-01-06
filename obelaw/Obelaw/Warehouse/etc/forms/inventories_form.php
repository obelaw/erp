<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Warehouse\Models\Warehouse;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Warehouse',
            'model' => 'warehouse_id',
            'options' => [
                'model' => Warehouse::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            // 'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Code',
            'model' => 'code',
            'rules' => 'required',
            // 'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Description',
            'model' => 'description',
            'rules' => 'nullable',
            // 'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Address',
            'model' => 'address',
            'rules' => 'nullable',
            // 'placeholder' => 'IPhone x6',
            'order' => 50,
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Inventory Has',
            'model' => 'has',
            'options' => [
                [
                    'label' => 'Has Products',
                    'value' => 'products',
                ],
                [
                    'label' => 'Has Variants',
                    'value' => 'variants',
                ]
            ],
            'rules' => 'required',
            'order' => 40,
            'hint' => 'You can not select.',
        ]);

        return $form->getFields();
    }
};
