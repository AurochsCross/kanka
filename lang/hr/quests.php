<?php

return [
    'create'        => [
        'title' => 'Novi zadatak',
    ],
    'destroy'       => [],
    'edit'          => [],
    'elements'      => [
        'create'    => [
            'success'   => 'Entitet :entity dodan na zadatak.',
            'title'     => 'Novi element za :name',
        ],
        'destroy'   => [
            'success'   => 'Element zadatka :entity uklonjen.',
        ],
        'edit'      => [
            'success'   => 'Element zadatka :entity ažuriran.',
            'title'     => 'Ažuriran element zadatka za :name',
        ],
        'fields'    => [
            'description'   => 'Opis',
            'quest'         => 'Zadatak',
        ],
        'title'     => 'Elementi zadatka :name',
    ],
    'fields'        => [
        'character'     => 'Inicijator',
        'copy_elements' => 'Kopirajte elemente pridružene zadatku',
        'date'          => 'Datum',
        'is_completed'  => 'Izvršen',
        'quest'         => 'Zadatak roditelj',
        'quests'        => 'Podzadatak',
        'role'          => 'Uloga',
    ],
    'helpers'       => [
        'nested_without'    => 'Prikazuju se svi zadaci koji nemaju zadatak roditelj. Klikni redak da bi vidio/la zadatke djecu.',
    ],
    'hints'         => [
        'quests'    => 'Mreža isprepletenih zadataka se može napraviti korištenjem Zadatak roditelj polja.',
    ],
    'index'         => [],
    'placeholders'  => [
        'date'  => 'Stvarni datum zadatka',
        'name'  => 'Naziv zadatka',
        'quest' => 'Zadatak roditelj',
        'role'  => 'Uloga ovog entieta u zadatku',
        'type'  => 'Priča o liku, Sporedni zadatak, Glavni zadatak',
    ],
    'show'          => [
        'actions'   => [
            'add_element'   => 'Dodaj element',
        ],
        'tabs'      => [
            'elements'  => 'Elementi',
        ],
    ],
];
