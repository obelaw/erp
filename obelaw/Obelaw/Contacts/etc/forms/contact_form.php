<?php

use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Contact type',
            'model' => 'type',
            'options' => [
                [
                    'label' => 'Customer',
                    'value' => '1',
                ],
                [
                    'label' => 'Company',
                    'value' => '2',
                ],
            ],
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Job position',
            'model' => 'job_position',
            'rules' => 'nullable',
            'placeholder' => 'Developer',
            'order' => 20,
        ]);

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
            'rules' => 'nullable',
            'placeholder' => '+201001234567',
            'order' => 40,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Mobile',
            'model' => 'mobile',
            'rules' => 'nullable',
            'placeholder' => '+201001234567',
            'order' => 50,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Email',
            'model' => 'email',
            'rules' => 'required',
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
