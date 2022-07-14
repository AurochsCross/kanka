<?php

return [
    'create'        => [
        'title' => 'Nova crònica',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'author'    => 'Autor',
        'date'      => 'Data',
        'image'     => 'Imatge',
        'journal'   => 'Crònica superior',
        'journals'  => 'Subcròniques',
        'name'      => 'Nom',
        'type'      => 'Tipus',
    ],
    'helpers'       => [
        'journals'          => 'Mostra totes o només les descendents directes d\'aquesta crònica.',
        'nested_without'    => 'S\'estan mostrant les cròniques sense pare. Feu clic a la fila d\'una família per a mostrar-ne les subcròniques.',
    ],
    'index'         => [
        'title' => 'Cròniques',
    ],
    'journals'      => [
        'title' => 'Subcròniques de la crònica :name',
    ],
    'placeholders'  => [
        'author'    => 'Qui ha escrit la crònica',
        'date'      => 'Data de la crònica',
        'journal'   => 'Trieu una crònica superior',
        'name'      => 'Nom de la crònica',
        'type'      => 'Sessió, esborrany...',
    ],
    'show'          => [
        'tabs'  => [
            'journals'  => 'Cròniques',
        ],
    ],
];
