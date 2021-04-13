<?php

return [
    'create'        => [
        'description'   => 'Ajouter une nouvelle note',
        'success'       => 'Note \':name\' créée.',
        'title'         => 'Nouvelle Note',
    ],
    'destroy'       => [
        'success'   => 'Note \':name\' supprimée.',
    ],
    'edit'          => [
        'success'   => 'Note \':name\' modifiée.',
        'title'     => 'Modifier Note :name',
    ],
    'fields'        => [
        'description'   => 'Description',
        'image'         => 'Image',
        'is_pinned'     => 'Épinglé',
        'name'          => 'Nom',
        'note'          => 'Note parent',
        'notes'         => 'Sous-notes',
        'type'          => 'Type',
    ],
    'helpers'       => [
        'nested_parent' => 'Affichage des notes de :parent.',
        'nested_without'=> 'Affichage des notes sans parent. Cliquer sur une rangée pour afficher les notes enfants.',
    ],
    'hints'         => [
        'is_pinned' => 'Jusqu\'à 3 notes peuvent être affichées sur le tableau de bord en les épinglant.',
    ],
    'index'         => [
        'add'           => 'Nouvelle Note',
        'description'   => 'Gérer les notes de :name.',
        'header'        => 'Notes de :name',
        'title'         => 'Notes',
    ],
    'placeholders'  => [
        'name'  => 'Nom de la note',
        'note'  => 'Choix d\'une note parent',
        'type'  => 'Religion, Race, Moyen de transport',
    ],
    'show'          => [
        'description'   => 'Détail de la note',
        'tabs'          => [
            'description'   => 'Description',
        ],
        'title'         => 'Note :name',
    ],
];
