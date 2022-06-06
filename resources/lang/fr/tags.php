<?php

return [
    'children'      => [
        'actions'   => [
            'add'   => 'Ajouter une nouvelle étiquette',
        ],
        'create'    => [
            'success'   => 'L\'étiquette :name a été ajoutée à l\'entité.',
            'title'     => 'Ajouter une nouvelle étiquette pour :name',
        ],
        'title'     => 'Enfants de l\'étiquette :name',
    ],
    'create'        => [
        'title' => 'Nouvelle étiquette',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'children'  => 'Enfants',
        'name'      => 'Nom',
        'tag'       => 'Étiquette Parentale',
        'tags'      => 'Étiquettes',
        'type'      => 'Type',
    ],
    'helpers'       => [
        'nested_parent' => 'Affichage des étiquettes de :parent.',
        'nested_without'=> 'Affichage des étiquettes sans parent. Cliquer sur une rangée pour afficher les étiquettes enfants.',
        'no_children'   => 'Il n\'y a actuellement aucune entité avec cette étiquette.',
    ],
    'hints'         => [
        'children'  => 'Cette liste contient toutes les entités directement dans cette étiquette et toutes les étiquettes enfants.',
        'tag'       => 'Affichées ci-dessous sont toutes les étiquettes enfants de cette étiquette.',
    ],
    'index'         => [
        'title' => 'Étiquettes',
    ],
    'new_tag'       => 'Nouvelle étiquette',
    'placeholders'  => [
        'name'  => 'Nom de l\'étiquette',
        'tag'   => 'Choix de l\'étiquette parent',
        'type'  => 'Légende, Guerres, Histoire, Religion',
    ],
    'show'          => [
        'tabs'  => [
            'children'  => 'Enfants',
            'tags'      => 'Étiquettes',
        ],
    ],
    'tags'          => [
        'title' => 'Étiquette :name',
    ],
];
