<?php

return [
    'create'        => [
        'title' => 'שיחה חדשה',
    ],
    'destroy'       => [],
    'edit'          => [
        'title' => 'שיחה :name',
    ],
    'fields'        => [
        'messages'      => 'הודעות',
        'name'          => 'שם',
        'participants'  => 'משתתפים',
        'target'        => 'קטגוריה',
        'type'          => 'סוג',
    ],
    'hints'         => [
        'participants'  => 'הוסף משתתפים בלחיצה על האייקון :icon בצד שמאל למעלה.',
    ],
    'index'         => [
        'title' => 'שיחות',
    ],
    'messages'      => [
        'destroy'       => [
            'success'   => 'ההודעה הוסרה.',
        ],
        'is_updated'    => 'עודכן',
        'load_previous' => 'טען הודעות קודמות',
        'placeholders'  => [
            'message'   => 'ההודעה שלך',
        ],
    ],
    'participants'  => [
        'create'    => [
            'success'   => ':entity הוסף לשיחה.',
        ],
        'destroy'   => [
            'success'   => ':entity הוסר מהשיחה.',
        ],
        'modal'     => 'משתתפים',
        'title'     => 'המשתתפים של :name',
    ],
    'placeholders'  => [
        'name'  => 'שם השיחה',
        'type'  => 'בתוך המשחק, הכנה, עלילה',
    ],
    'show'          => [],
    'tabs'          => [
        'conversation'  => 'שיחה',
        'participants'  => 'משתתפים',
    ],
    'targets'       => [
        'characters'    => 'דמויות',
        'members'       => 'שחקנים',
    ],
];
