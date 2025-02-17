<?php

return [
    'create'        => [
        'title' => 'Nowy przedmiot',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'character' => 'Postać',
        'item'      => 'Przedmiot źródłowy',
        'items'     => 'Przedmiot pochodny',
        'price'     => 'Cena',
        'size'      => 'Rozmiar',
    ],
    'helpers'       => [
        'nested_without'    => 'Wyświetlono przedmioty nieposiadające źródła. Kliknij na rząd by zobaczyć przedmioty pochodne.',
    ],
    'hints'         => [
        'items' => 'Porządkuj przedmioty według źródeł',
    ],
    'index'         => [],
    'inventories'   => [
        'title' => 'Ekwipunki przedmiotu :name',
    ],
    'placeholders'  => [
        'name'  => 'Nazwa przedmiotu',
        'price' => 'Cena przedmiotu',
        'size'  => 'Wielkość, ciężar, wymiary',
        'type'  => 'Broń, eliksir, artefakt',
    ],
    'show'          => [
        'tabs'  => [
            'inventories'   => 'Ekwipunki',
        ],
    ],
];
