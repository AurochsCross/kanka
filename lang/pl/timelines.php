<?php

return [
    'actions'       => [
        'add_element'   => 'Dodaj do epoki :era',
        'back'          => 'Powrót do :name',
        'edit'          => 'Edytuj historię',
        'save_order'    => 'Zapisz nową kolejność',
    ],
    'create'        => [
        'title' => 'Nowa historia',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'copy_elements' => 'Kopiuj składowe',
        'copy_eras'     => 'Kopiuj epoki',
        'eras'          => 'Epoki',
        'reverse_order' => 'Odwróć kolejność epok',
        'timeline'      => 'Historia źródłowa',
        'timelines'     => 'Historie pochodne',
    ],
    'helpers'       => [
        'nested_without'    => 'Wyświetlono wszystkie historie nieposiadające źródła. Kliknij na rząd, by wyświetlić historie pochodne.',
        'reverse_order'     => 'Zaznacz by wyświetlać epoki w odwróconym porządku chronologicznym (od najdawniejszej)',
    ],
    'index'         => [],
    'placeholders'  => [
        'name'  => 'Nazwa historii',
        'type'  => 'Główna, kronika dziejów świata, historia królestwa',
    ],
    'reorder'       => [
        'success'   => 'Zmieniono kolejność historii',
        'title'     => 'Zmień kolejność historii',
    ],
    'show'          => [
        'tabs'  => [
            'reorder'   => 'Kolejność historii',
            'timelines' => 'Historie',
        ],
    ],
    'timelines'     => [
        'title' => 'Historie historii :name',
    ],
];
