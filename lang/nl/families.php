<?php

return [
    'create'        => [
        'title' => 'Nieuwe Familie',
    ],
    'destroy'       => [],
    'edit'          => [],
    'families'      => [
        'title' => 'Familie :name Families',
    ],
    'fields'        => [
        'families'  => 'Sub Families',
        'family'    => 'Bovenliggende Familie',
        'members'   => 'Leden',
    ],
    'helpers'       => [
        'descendants'   => 'Deze lijst bevat alle families die afstammen van deze familie, en niet alleen de families er direct onder.',
    ],
    'hints'         => [
        'members'   => 'Leden van een familie worden hier vermeld. Een personage kan aan een familie worden toegevoegd door het gewenste personage te bewerken en de vervolgkeuzelijst "Familie" te gebruiken.',
    ],
    'index'         => [],
    'members'       => [
        'helpers'   => [
            'all_members'       => 'De volgende lijst bevat alle personages die in deze familie voorkomen en alle afstammelingen van de familie.',
            'direct_members'    => 'De meeste families hebben leden die het runnen of het beroemd hebben gemaakt. De volgende lijst bevat personages die direct in deze familie voorkomen.',
        ],
        'title'     => 'Family :name Leden',
    ],
    'placeholders'  => [
        'location'  => 'Kies een locatie',
        'name'      => 'Naam van de familie',
        'type'      => 'Koninklijk, Adel, Uitgestorven',
    ],
    'show'          => [
        'tabs'  => [
            'all_members'   => 'Alle Leden',
            'families'      => 'Families',
            'members'       => 'Leden',
        ],
    ],
];
