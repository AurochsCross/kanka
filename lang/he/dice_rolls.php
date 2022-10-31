<?php

return [
    'create'        => [
        'title' => 'גלגול חדש',
    ],
    'destroy'       => [
        'dice_roll' => 'הגלגול הוסר',
    ],
    'edit'          => [],
    'fields'        => [
        'created_at'    => 'גולגל ב',
        'parameters'    => 'פרמטרים',
        'results'       => 'תוצאות',
        'rolls'         => 'הטלות',
    ],
    'hints'         => [
        'parameters'    => 'מה האפשרויות לקבויות?',
    ],
    'index'         => [
        'actions'   => [
            'dice'      => 'גלגולים',
            'results'   => 'תוצאות',
        ],
    ],
    'placeholders'  => [
        'dice_roll' => 'גלגול',
        'name'      => 'שם הגלגול',
        'parameters'=> '4d6+3',
    ],
    'results'       => [
        'actions'   => [
            'add'   => 'הטל',
        ],
        'error'     => 'הטלת הקוביות נכשלה. לא ניתן לפרש את הפרמטרים.',
        'fields'    => [
            'creator'   => 'יוצר',
            'date'      => 'תאריך',
            'result'    => 'תוצאה',
        ],
        'hint'      => 'כל ההטלות של גלגולים מתבנית זו.',
        'success'   => 'ההטלה בוצעה.',
    ],
    'show'          => [
        'tabs'  => [
            'results'   => 'תוצאה',
        ],
    ],
];
