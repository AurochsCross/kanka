<?php

return [
    'create'        => [
        'title' => 'New Family',
    ],
    'families'      => [
        'title' => 'Family :name Families',
    ],
    'fields'        => [
        'families'  => 'Sub Families',
        'family'    => 'Parent Family',
        'members'   => 'Members',
    ],
    'helpers'       => [
        'descendants'       => 'This list contains all families which are descendants of this family, and not only those directly under it.',
        'nested_without'    => 'Displaying all families that don\'t have a parent family. Click on a row to see the children families.',
    ],
    'hints'         => [
        'members'   => 'Members of a family are listed here. A character can be added to a family by editing the desired character and using the "Family" dropdown.',
    ],
    'members'       => [
        'helpers'   => [
            'all_members'       => 'The following list are all characters that are in this family and all of the family\'s descendant families.',
            'direct_members'    => 'Most families have members who run it or made it famous. The following list are characters that are directly in this family.',
        ],
        'title'     => 'Family :name Members',
    ],
    'placeholders'  => [
        'location'  => 'Choose a location',
        'name'      => 'Name of the family',
        'type'      => 'Royal, Noble, Extinct',
    ],
    'show'          => [
        'tabs'  => [
            'all_members'   => 'All Members',
            'families'      => 'Families',
            'members'       => 'Members',
        ],
    ],
];
