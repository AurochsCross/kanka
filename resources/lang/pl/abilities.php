<?php

return [
    'abilities'     => [
        'title' => 'Zdolności wywodzące się od :name',
    ],
    'children'      => [
        'actions'       => [
            'add'   => 'Dodaj zdolność do elementu',
        ],
        'create'        => [
            'success'   => 'Dodano elementowi zdolność :name',
            'title'     => 'Dodaj elementowi zdolność :name',
        ],
        'description'   => 'Elementy posiadające tę zdolność',
        'title'         => 'Elementy zdolności :name',
    ],
    'create'        => [
        'title' => 'Nowa zdolność',
    ],
    'destroy'       => [],
    'edit'          => [],
    'entities'      => [
        'title' => 'Elementy posiadające zdolność :name',
    ],
    'fields'        => [
        'abilities' => 'Zdolności pochodne',
        'ability'   => 'Zdolność źródłowa',
        'charges'   => 'Ładunki',
        'name'      => 'Nazwa',
        'type'      => 'Rodzaj',
    ],
    'helpers'       => [
        'descendants'       => 'Na liście znajdują się wszystkie zdolności pochodzące od tej zdolności, nie tylko bezpośrednio.',
        'nested_without'    => 'Wyświetlono wszystkie zdolności nie posiadające źródła. Kliknij na rząd, by wyświetlić zdolności pochodne.',
    ],
    'index'         => [
        'title' => 'Zdolności',
    ],
    'placeholders'  => [
        'charges'   => 'Liczba ładunków zdolności. Możesz wpisać wartość cechy jako {Level}*{CHA}',
        'name'      => 'Kula ognia, alarm, podstępny atak',
        'type'      => 'Czar, umiejętność, technika bojowa',
    ],
    'show'          => [
        'tabs'  => [
            'abilities' => 'Zdolności',
            'entities'  => 'Elementy',
        ],
    ],
];
