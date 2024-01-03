<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Catalog\Models\Catagory;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Catagory',
            'model' => 'catagory_id',
            'options' => [
                'model' => Catagory::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'nullable',
            'order' => 20,
            'hint' => 'You can not select.',
        ]);

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

        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'SKU',
            'model' => 'sku',
            'rules' => 'required',
            'placeholder' => 'iphone-x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Product Can',
            'model' => 'can',
            'options' => [
                [
                    'label' => 'Can be Sold',
                    'value' => 'sold',
                ],
                [
                    'label' => 'Can be Purchased',
                    'value' => 'purchased',
                ]
            ],
            'rules' => 'required',
            'order' => 40,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Point Of Sale',
            'model' => 'in_pos',
            'rules' => 'nullable',
            'order' => 50,
            'hint' => 'Available in POS',
        ]);
    }
};
