<?php

use Obelaw\Catalog\Models\Product;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Manufacturing\Models\Plan;
use Obelaw\Manufacturing\Models\Worker;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Product',
            'model' => 'product_id',
            'options' => [
                'model' => Product::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 20,
            'selected' => 'product_id_changed'
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Inventory',
            'model' => 'inventory_id',
            'options' => [],
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Plan',
            'model' => 'plan',
            'options' => [
                'model' => Plan::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'nullable',
            'order' => 20,
            'selected' => 'product_id_changed'
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Quantity',
            'model' => 'quantity',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Workers',
            'model' => 'workers',
            'options' => [
                'model' => Worker::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 20,
            'multiple' => true
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'Start At',
            'model' => 'start_at',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'End At',
            'model' => 'end_at',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);
    }
};
