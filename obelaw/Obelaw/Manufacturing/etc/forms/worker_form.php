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

        $form->addField(FieldType::TEXT, [
            'label' => 'Job Position',
            'model' => 'job_position',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Employee Code',
            'model' => 'employee_code',
            'rules' => 'nullable',
            'placeholder' => 'IPhone x6',
            'order' => 30,
        ]);
    }
};
