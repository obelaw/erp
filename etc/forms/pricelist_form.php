<?php

use Obelaw\Framework\Builder\Form\Fields;
use Obelaw\Framework\Builder\Contracts\FieldType;
use Obelaw\Warehouse\Models\Product;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Product',
            'model' => 'sku',
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
            'label' => 'Price',
            'model' => 'price',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);
    }
};
