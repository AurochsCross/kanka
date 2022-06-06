<?php

return [
    'create'        => [
        'title' => 'Nova rolagem de dados',
    ],
    'destroy'       => [
        'dice_roll' => 'Rolagem de dados removida',
    ],
    'edit'          => [],
    'fields'        => [
        'created_at'    => 'Rolado em',
        'name'          => 'Nome',
        'parameters'    => 'Parâmetros',
        'results'       => 'Resultados',
        'rolls'         => 'Rolagens',
    ],
    'hints'         => [
        'parameters'    => 'Quais são mimnhas opções de dados?',
    ],
    'index'         => [
        'actions'   => [
            'dice'      => 'Rolagem de dados',
            'results'   => 'Resultados',
        ],
        'title'     => 'Rolagens de dado',
    ],
    'placeholders'  => [
        'dice_roll' => 'Rolagem de dados',
        'name'      => 'Nome da rolagem de dados',
        'parameters'=> '4d6+3',
    ],
    'results'       => [
        'actions'   => [
            'add'   => 'Rolagem',
        ],
        'error'     => 'Rolagem de dados mal sucedida. Não é possível analisar os parâmetros.',
        'fields'    => [
            'creator'   => 'Criador',
            'date'      => 'Data',
            'result'    => 'Resultado',
        ],
        'hint'      => 'Todas as rolagens feitas para este modelo de rolagem de dados.',
        'success'   => 'Dados rolados',
    ],
    'show'          => [
        'tabs'  => [
            'results'   => 'Resultados',
        ],
    ],
];
