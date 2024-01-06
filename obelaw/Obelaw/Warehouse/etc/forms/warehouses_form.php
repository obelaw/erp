<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            // 'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Code',
            'model' => 'code',
            'rules' => 'required',
            // 'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Description',
            'model' => 'description',
            'rules' => 'nullable',
            // 'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);

        $form->addField(FieldType::TEXTAREA, [
            'label' => 'Address',
            'model' => 'address',
            'rules' => 'nullable',
            // 'placeholder' => 'IPhone x6',
            'order' => 40,
        ]);
    }
};
