<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Vendor type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Person',
                    'value' => 'person',
                ],
                [
                    'label' => 'Company',
                    'value' => 'company',
                ],
            ],
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Vendor name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Vendor phone',
            'model' => 'phone',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Vendor mobile',
            'model' => 'mobile',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Vendor email',
            'model' => 'email',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Vendor website',
            'model' => 'website',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);
    }
};
