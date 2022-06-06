<?php

return [
    'create'        => [
        'title' => 'Criar uma nova nota',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'description'   => 'Descrição',
        'image'         => 'Imagem',
        'is_pinned'     => 'Fixada',
        'name'          => 'Nome',
        'note'          => 'Nota Primária',
        'notes'         => 'Notas secundárias',
        'type'          => 'Tipo',
    ],
    'helpers'       => [
        'nested_parent' => 'Mostrando as notas de :parent.',
        'nested_without'=> 'Mostrando todas as notas que não tem uma nota-pai. Clique em uma linha para ver as notas-filhos.',
    ],
    'hints'         => [
        'is_pinned' => 'Até 3 notas podem ser fixadas no dashboard',
    ],
    'index'         => [
        'title' => 'Notas',
    ],
    'placeholders'  => [
        'name'  => 'Nome da nota',
        'note'  => 'Escolha uma nota Primária',
        'type'  => 'Religião, Raça, Sistema político',
    ],
    'show'          => [],
];
