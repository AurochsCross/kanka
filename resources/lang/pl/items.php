<?php

return [
    'create'        => [
        'title' => 'Nowy przedmiot',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'character' => 'Postać',
        'image'     => 'Obraz',
        'location'  => 'Miejsce',
        'name'      => 'Nazwa',
        'price'     => 'Cena',
        'size'      => 'Rozmiar',
        'type'      => 'Rodzaj',
    ],
    'index'         => [
        'title' => 'Przedmioty',
    ],
    'inventories'   => [
        'title' => 'Ekwipunki przedmiotu :name',
    ],
    'placeholders'  => [
        'character' => 'Wybierz postać',
        'location'  => 'Wybierz miejsce',
        'name'      => 'Nazwa przedmiotu',
        'price'     => 'Cena przedmiotu',
        'size'      => 'Wielkość, ciężar, wymiary',
        'type'      => 'Broń, eliksir, artefakt',
    ],
    'show'          => [
        'tabs'  => [
            'inventories'   => 'Ekwipunki',
        ],
    ],
];
