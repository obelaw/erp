<?php

use Obelaw\Accounting\Model\AccountShapes\APAccount;
use Obelaw\Accounting\Model\AccountShapes\ARAccount;
use Obelaw\Accounting\Model\AccountShapes\CurrentLiabilitiesAccount;
use Obelaw\Accounting\Model\AccountShapes\IncomeAccount;
use Obelaw\Accounting\Model\PaymentMethod;
use Obelaw\UI\Schema\Form\Fields;
use Obelaw\UI\Schema\Form\FieldType;

return new class
{
    public function form(Fields $form)
    {
        $form->addTab(
            id: 'customer_accounting',
            label: 'Accounting',
            fields: function (Fields $fields) {
                $fields->addField(FieldType::SELECT, [
                    'label' => 'Account Receivable',
                    'model' => 'obelaw_erp_sales_customers_default_account_receivable',
                    'options' => [
                        'model' => ARAccount::class,
                        'row' => [
                            'label' => 'name',
                            'value' => 'id',
                        ]
                    ],
                    'rules' => 'nullable',
                    'order' => 80,
                    'hint' => 'You can not select.',
                ]);

                $fields->addField(FieldType::SELECT, [
                    'label' => 'Account Payable',
                    'model' => 'obelaw_erp_sales_customers_default_account_payable',
                    'options' => [
                        'model' => APAccount::class,
                        'row' => [
                            'label' => 'name',
                            'value' => 'id',
                        ]
                    ],
                    'rules' => 'nullable',
                    'order' => 90,
                    'hint' => 'You can not select.',
                ]);

                $fields->addField(FieldType::SELECT, [
                    'label' => 'Tax Received',
                    'model' => 'obelaw_erp_sales_customers_default_account_tax',
                    'options' => [
                        'model' => CurrentLiabilitiesAccount::class,
                        'row' => [
                            'label' => 'name',
                            'value' => 'id',
                        ]
                    ],
                    'rules' => 'nullable',
                    'order' => 90,
                    'hint' => 'You can not select.',
                ]);

                $fields->addField(FieldType::SELECT, [
                    'label' => 'Product Sales',
                    'model' => 'obelaw_erp_sales_customers_default_account_productSales',
                    'options' => [
                        'model' => IncomeAccount::class,
                        'row' => [
                            'label' => 'name',
                            'value' => 'id',
                        ]
                    ],
                    'rules' => 'nullable',
                    'order' => 90,
                    'hint' => 'You can not select.',
                ]);
            }
        );

        $form->addTab(
            id: 'vat',
            label: 'VAT',
            fields: function (Fields $fields) {
                $fields->addField(FieldType::TEXT, [
                    'label' => 'Orders Vat',
                    'model' => 'obelaw_erp_sales_orders_vat',
                    'rules' => 'nullable',
                    'placeholder' => 'You can set 0 if you need to create orders without VAT',
                ]);
            }
        );

        $form->addTab(
            id: 'payment_methods',
            label: 'Payment Methods',
            fields: function (Fields $fields) {
                $fields->addField(FieldType::SELECT, [
                    'label' => 'Default Payment Methods',
                    'model' => 'obelaw_erp_sales_payment_methods_default',
                    'options' => [
                        'model' => PaymentMethod::class,
                        'row' => [
                            'label' => 'name',
                            'value' => 'id',
                        ]
                    ],
                    'rules' => 'nullable',
                    'hint' => 'You can not select.',
                ]);

                $fields->addField(FieldType::SELECT, [
                    'label' => 'Reference Payment Required',
                    'model' => 'obelaw_erp_sales_payment_methods_reference_required',
                    'options' => [
                        [
                            'label' => 'Yes',
                            'value' => 'yes',
                        ],
                        [
                            'label' => 'No',
                            'value' => 'no',
                        ],
                    ],
                    'rules' => 'nullable',
                    'hint' => 'You can not select.',
                ]);
            }
        );
    }
};
