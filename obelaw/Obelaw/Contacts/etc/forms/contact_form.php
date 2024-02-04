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
            'placeholder' => 'Karim M.',
            'order' => 30,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Phone',
            'model' => 'phone',
            'rules' => 'required',
            'placeholder' => '+201001234567',
            'order' => 40,
        ]);


        $form->addField(FieldType::TEXT, [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'nullable',
            'placeholder' => 'karim@obelaw.com',
            'order' => 60,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Website',
            'model' => 'website',
            'rules' => 'nullable',
            'placeholder' => 'karim@obelaw.com',
            'order' => 70,
        ]);
    }
};
