<?php

use Obelaw\Catalog\Models\Product;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Warehouse\Models\Place\Inventory;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Inventory',
            'model' => 'place_id',
            'options' => [
                'model' => Inventory::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
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
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Quantity',
            'model' => 'quantity',
            'rules' => 'required|integer|min:1',
            // 'placeholder' => 'IPhone x6',
            'order' => 50,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Description',
            'model' => 'description',
            'rules' => 'nullable',
            // 'placeholder' => 'IPhone x6',
            'order' => 60,
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Create serials',
            'model' => 'create_serials',
            'rules' => 'nullable',
            'hint' => 'You can create serial numbers for this quantity',
            'order' => 50,
        ]);
    }
};
