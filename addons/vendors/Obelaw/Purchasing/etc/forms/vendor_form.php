<?php

use Obelaw\Accounting\Model\Account;
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
            'rules' => 'required|unique:Obelaw\Purchasing\Models\Vendor,phone',
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

        // $form->addField(FieldType::SELECT, [
        //     'label' => 'Account Receivable',
        //     'model' => 'account_receivable',
        //     'options' => Account::where('type', 'accounts_receivable')->get()->map(function ($r) {
        //         return [
        //             'label' => $r['name'],
        //             'value' => $r['id'],
        //         ];
        //     })->toArray(),
        //     'rules' => 'nullable',
        //     'order' => 80,
        //     'hint' => 'You can not select.',
        // ]);

        // $form->addField(FieldType::SELECT, [
        //     'label' => 'Account Payable',
        //     'model' => 'account_payable',
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
};
