<?php

return [
    'income_account' => 5,
    'customers' => [
        'default' => [
            'account' => [
                'payable' => null,
                'receivable' => null,
                'tax' => null,
                'productSales' => null,
            ],
        ],
        // 'default_account_payable' => 9,
        // 'default_account_receivable' => null,
    ],

    'orders' => [
        'vat' => 14,
    ],

    'payment_methods' => [
        'default' => null,
        'reference_required' => false,
    ],

    'invoice' => [
        'header' => [
            'company_name' => 'Company Name',
            'line_1' => 'Company Name',
            'line_2' => 'Street Address',
            'line_3' => 'City',
            'line_4' => 'company@mail.test',
        ],
        'footer' => [
            'message' => 'Thank you very much for doing business with us. We look forward to working with you again!',
        ],
    ]
];
