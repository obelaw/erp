<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::TEXT, [
            'label' => 'name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'Start At',
            'model' => 'start_at',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::DATE, [
            'label' => 'End At',
            'model' => 'end_at',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);
    }
};
