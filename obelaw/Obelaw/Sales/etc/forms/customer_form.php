<?php

use Obelaw\Accounting\Model\Account;
use Obelaw\Accounting\Model\AccountShapes\ARAccount;
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

        $form->addTab(
            id: 'customer_accounting',
            label: 'Accounting',
            fields: function (Fields $fields) {
                // $fields->addField(FieldType::SELECT, [
                //     'label' => 'Account Receivable',
                //     'model' => 'accounts.receivable_id',
                //     'options' => [
                //         'model' => ARAccount::class,
                //         'row' => [
                //             'label' => 'name',
                //             'value' => 'id',
                //         ]
                //     ],
                //     'rules' => 'nullable',
                //     'order' => 80,
                //     'hint' => 'You can not select.',
                // ]);
                // $fields->addField(FieldType::SELECT, [
                //     'label' => 'Account Payable',
                //     'model' => 'accounts.payable_id',
                //     'options' => Account::where('type', 'accounts_payable')->get()->map(function ($r) {
                //         return [
                //             'label' => $r['name'],
                //             'value' => $r['id'],
                //         ];
                //     })->toArray(),
                //     'rules' => 'nullable',
                //     'order' => 90,
                //     'hint' => 'You can not select.',
                // ]);
            }
        );
    }
};
