<?php

use Obelaw\Accounting\Lib\COA\AccountType;
use Obelaw\Accounting\Model\Account;
use Obelaw\Schema\Form\Fields;
use Obelaw\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addField(FieldType::SELECT, [
            'label' => 'Parent account',
            'model' => 'parent_account',
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
            'label' => 'Account name',
            'model' => 'name',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 10,
        ]);

        $form->addField(FieldType::TEXT, [
            'label' => 'Account code',
            'model' => 'code',
            'rules' => 'required',
            'placeholder' => 'IPhone x6',
            'order' => 20,
        ]);

        $form->addField(FieldType::SELECT, [
            'label' => 'Account type',
            'model' => 'type',
            'options' => array_map(function ($type) {
                return [
                    'label' => $type['label'],
                    'value' => $type['key'],
                ];
            }, AccountType::getTypes()),
            'rules' => 'required',
            'order' => 30,
            'hint' => 'You can not select.',
        ]);
    }
};
