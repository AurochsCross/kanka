<?php

return [
    'create'        => [
        'title' => 'Criar novo jornal',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'author'    => 'Autor',
        'date'      => 'Data',
        'journal'   => 'Jornal Principal',
        'journals'  => 'Jornais secundários',
    ],
    'helpers'       => [
        'journals'          => 'Mostrar todos ou somente os jornais secundários deste Jornal',
        'nested_without'    => 'Mostrando todos os jornais que não tem um jornal-pai. Clique em uma linha para ver os jornais-filhos.',
    ],
    'index'         => [],
    'journals'      => [
        'title' => 'Jornais secundários do Jornal :name',
    ],
    'placeholders'  => [
        'author'    => 'Quem escreveu o jornal',
        'date'      => 'Data do jornal',
        'journal'   => 'Escolha um Jornal Principal',
        'name'      => 'Nome do jornal',
        'type'      => 'Sessão, One Shot, Rascunho',
    ],
    'show'          => [
        'tabs'  => [
            'journals'  => 'Jornais',
        ],
    ],
];
