<?php

use Obelaw\Accounting\Model\Account;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'journal Account',
            'model' => 'journal_id',
            'options' => [
                'model' => Account::class,
                'row' => [
                    'label' => 'name',
                    'value' => 'id',
                ]
            ],
            'rules' => 'nullable',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'Karim M.',
            'order' => 20,
        ]);

        $form->addField(FieldType::CHECKBOX, [
            'label' => 'Active',
            'model' => 'is_active',
            'rules' => 'nullable',
            'order' => 30,
            'hint' => 'Active',
        ]);
    }
};
