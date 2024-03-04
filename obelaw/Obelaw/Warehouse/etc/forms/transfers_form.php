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
            'label' => 'Inventory from',
            'model' => 'inventory_from',
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
            'label' => 'Inventory to',
            'model' => 'inventory_to',
            'options' => [
                'model' => Inventory::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'required',
            'order' => 20,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Supply',
                    'value' => 'supply',
                ],
                [
                    'label' => 'Transfer',
                    'value' => 'transfer',
                ],
                [
                    'label' => 'Order',
                    'value' => 'order',
                ],
                [
                    'label' => 'Customer Return',
                    'value' => 'return',
                ],
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Product SKU',
            'model' => 'product_id',
            'options' => [
                'model' => Product::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'sku',
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

        return $form->getFields();
    }
};
