<?php

return [
    'create'        => [
        'title' => 'Novi predmet',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'character' => 'Lik',
        'price'     => 'Cijena',
        'size'      => 'Veličina',
    ],
    'index'         => [],
    'inventories'   => [
        'title' => 'Inventar predmeta :name',
    ],
    'placeholders'  => [
        'name'  => 'Naziv predmeta',
        'price' => 'Cijena predmeta',
        'size'  => 'Veličina, težina, dimenzije',
        'type'  => 'Oružje, napitak, artefakt',
    ],
    'show'          => [
        'tabs'  => [
            'inventories'   => 'Informacije',
        ],
    ],
];
