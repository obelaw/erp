<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Warehouse\Models\Catagory;

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
            'rules' => 'required|unique:Obelaw\Warehouse\Models\Product,sku',
            'placeholder' => 'iphone-x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Product Type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Primitive',
                    'value' => 'primitive',
                ],
                [
                    'label' => 'Finished',
                    'value' => 'finished',
                ]
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        // $form->addField(FieldType::SELECT, [
        //     'label' => 'Measuring Unit',
        //     'model' => 'measuring_unit',
        //     'options' => [
        //         [
        //             'label' => 'Piece',
        //             'value' => 'piece',
        //         ],
        //         [
        //             'label' => 'ML',
        //             'value' => 'ml',
        //         ],
        //     ],
        //     'rules' => 'required',
        //     'order' => 30,
        //     'hint' => 'You can not select.',
        // ]);

        return $form->getFields();
    }
};
