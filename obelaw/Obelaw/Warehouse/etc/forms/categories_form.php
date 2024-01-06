<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;
use Obelaw\Warehouse\Models\Catagory;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXT, [
            'label' => 'obelaw-warehouse::forms.name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Catagory Parent',
            'model' => 'parent_id',
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

        return $form->getFields();
    }
};
