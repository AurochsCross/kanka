<?php

return [
    'create'        => [
        'title' => 'Nova organització',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'members'       => 'Membres',
        'organisation'  => 'Organització superior',
        'organisations' => 'Suborganitzacions',
    ],
    'helpers'       => [
        'descendants'       => 'Aquí es mostren totes les organitzacions que descendeixen d\'aquesta organització, no només les directament inferiors.',
        'nested_without'    => 'S\'estan mostrant les organitzacions sense pare. Feu clic a la fila d\'una organització per a mostrar-ne les descendents.',
    ],
    'index'         => [],
    'members'       => [
        'actions'       => [
            'add'   => 'Afegeix un membre',
        ],
        'create'        => [
            'success'   => 'S\'ha afegit el membre a l\'organització.',
            'title'     => 'Nou membre de :name',
        ],
        'destroy'       => [
            'success'   => 'S\'ha tret el membre de l\'organització.',
        ],
        'edit'          => [
            'success'   => 'S\'ha actualitzat el membre de l\'organització.',
            'title'     => 'Actualitza un membre de :name',
        ],
        'fields'        => [
            'character'     => 'Personatge',
            'organisation'  => 'Organització',
            'role'          => 'Rol',
        ],
        'helpers'       => [
            'all_members'   => 'Tots els personatges que pertanyen a aquesta organització i les seves suborganitzacions.',
            'members'       => 'Tots els membres que pertanyen a aquesta organització.',
        ],
        'placeholders'  => [
            'character' => 'Trieu un personatge',
            'role'      => 'Líder, membre, Mestre d\'espies, Septó Suprem...',
        ],
        'title'         => 'Membres de :name',
    ],
    'organisations' => [
        'title' => 'Organitzacions de :name',
    ],
    'placeholders'  => [
        'location'  => 'Trieu un indret',
        'name'      => 'Nom de l\'organització',
        'type'      => 'Secta, banda, rebel·lió, gremi...',
    ],
    'quests'        => [],
    'show'          => [
        'tabs'  => [
            'organisations' => 'Organitzacions',
        ],
    ],
];
