<?php

return [
    'characters'    => [
        'helpers'   => [
            'all_characters'    => 'Displaying all the characters related to this race and it\'s sub races.',
            'characters'        => 'Displaying all the characters directly related to this race.',
        ],
        'title'     => 'Race :name Characters',
    ],
    'create'        => [
        'title' => 'New Race',
    ],
    'fields'        => [
        'characters'    => 'Characters',
        'name'          => 'Name',
        'race'          => 'Parent Race',
        'races'         => 'Sub Races',
        'type'          => 'Type',
    ],
    'helpers'       => [
        'nested_without'=> 'Displaying all races that don\'t have a parent race. Click on a row to see the children races.',
    ],
    'index'         => [
        'title' => 'Races',
    ],
    'placeholders'  => [
        'name'  => 'Name of the race',
        'type'  => 'Human, Fey, Borg',
    ],
    'races'         => [
        'title' => 'Race :name Subraces',
    ],
    'show'          => [
        'tabs'  => [
            'characters'    => 'Characters',
            'races'         => 'Subraces',
        ],
    ],
];
