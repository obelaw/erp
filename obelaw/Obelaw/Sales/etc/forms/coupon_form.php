<?php

use Obelaw\Schema\Form\Fields;

return new class
{
    public function form(Fields $form)
    {
        $form->addField('text', [
            'label' => 'Coupon name',
            'model' => 'coupon_name',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('text', [
            'label' => 'Coupon code',
            'model' => 'coupon_code',
            'rules' => 'required',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Discount type',
            'model' => 'discount_type',
            'options' => [
                [
                    'label' => 'Percentage',
                    'value' => 'percentage',
                ],
                [
                    'label' => 'Fixed',
                    'value' => 'fixed',
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ], 'action');

        $form->addField('text', [
            'label' => 'Discount value',
            'model' => 'discount_value',
            'rules' => 'required',
            'order' => 10,
        ], 'action');

        // $form->addField('select', [
        //     'label' => 'Condition',
        //     'model' => 'condition',
        //     'options' => [
        //         [
        //             'label' => 'Active',
        //             'value' => true,
        //         ],
        //         [
        //             'label' => 'Inactive',
        //             'value' => false,
        //         ],
        //     ],
        //     'rules' => 'nullable',
        //     'order' => 50,
        // ], 'action');

        // $form->addField('text', [
        //     'label' => 'Condition data',
        //     'model' => 'condition_data',
        //     'rules' => 'nullable',
        //     'order' => 10,
        // ], 'action');

        $form->addField('date', [
            'label' => 'Start at',
            'model' => 'start_at',
            'rules' => 'nullable',
            'order' => 10,
        ]);

        $form->addField('date', [
            'label' => 'Ends at',
            'model' => 'ends_at',
            'rules' => 'nullable',
            'order' => 10,
        ]);

        $form->addField('select', [
            'label' => 'Active',
            'model' => 'is_active',
            'options' => [
                [
                    'label' => 'Active',
                    'value' => true,
                ],
                [
                    'label' => 'Inactive',
                    'value' => false,
                ],
            ],
            'rules' => 'required',
            'order' => 50,
        ]);
    }
};
