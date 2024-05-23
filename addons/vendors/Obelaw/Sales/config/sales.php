<?php

return [
    'income_account' => 5,
    'customers' => [
        'default_account_payable' => 9,
        'default_account_receivable' => 10,
    ],

    'orders' => [
        'vat' => 14,
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
