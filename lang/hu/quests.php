<?php

return [
    'create'        => [
        'title' => 'Új küldetés',
    ],
    'destroy'       => [],
    'edit'          => [],
    'elements'      => [
        'create'    => [
            'success'   => ':entity entitást hozzáadtuk a küldetéshez.',
            'title'     => ':name új eleme',
        ],
        'destroy'   => [
            'success'   => ':entity küldetéselemét eltávolítottuk.',
        ],
        'edit'      => [
            'success'   => ':entity küldetéselemét frissítettük.',
            'title'     => ':name küldetéselemének firssítése',
        ],
        'fields'    => [
            'description'   => 'Leírás',
            'quest'         => 'Küldetés',
        ],
        'title'     => ':name küldetés elemei',
    ],
    'fields'        => [
        'character'     => 'Küldetésadó',
        'copy_elements' => 'A küldetéshez tartozó elemek másolása',
        'date'          => 'Dátum',
        'is_completed'  => 'Teljesítve',
        'quest'         => 'Szülő Küldetés',
        'quests'        => 'Alküldetések',
        'role'          => 'Szerep',
    ],
    'helpers'       => [
        'nested_without'    => 'Minden küldetést megmutat, aminek nincs szülője. Klikkelj egy sorra, hogy lásd a gyermekküldetéseit.',
    ],
    'hints'         => [
        'quests'    => 'A főküldetés és az alküldetések mezők használatával összefüggő küldetések hálóját építheted fel.',
    ],
    'index'         => [],
    'placeholders'  => [
        'date'  => 'A küldetés valós világbéli dátuma',
        'name'  => 'A küldetés neve',
        'quest' => 'Főküldetés',
        'role'  => 'Az entitás szerepe a küldetésben',
        'type'  => 'Karaktertörténet, mellékszál, főszál',
    ],
    'show'          => [
        'actions'   => [
            'add_element'   => 'Elem hozzáadása',
        ],
        'tabs'      => [
            'elements'  => 'Elemek',
        ],
    ],
];
