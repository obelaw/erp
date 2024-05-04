<?php

use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;
use Obelaw\Warehouse\Enums\TransferType;
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
            'options' => array_map(function ($type) {
                return [
                    'label' => $type->name,
                    'value' => $type->value,
                ];
            }, TransferType::cases()),
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
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
