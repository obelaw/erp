<?php

use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

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

        $form->addField(FieldType::TEXT, [
            'label' => 'Code',
            'model' => 'code',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'Due date',
            'model' => 'start_date',
            'rules' => 'nullable',
            'order' => 30,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'End date',
            'model' => 'end_date',
            'rules' => 'nullable',
            'order' => 40,
        ]);
    }
};
