<?php

return [
    'attribute_templates'   => [
        'title' => ':name attribuutsjablonen',
    ],
    'create'                => [
        'title' => 'Nieuw attribuutsjabloon',
    ],
    'destroy'               => [],
    'edit'                  => [],
    'fields'                => [
        'attribute_template'    => 'Bovenliggende Attribuutsjabloon',
        'attributes'            => 'Attributen',
        'name'                  => 'Naam',
    ],
    'hints'                 => [
        'automatic'                 => 'Attributen worden automatisch toegepast vanuit de :link Attribuutsjabloon',
        'entity_type'               => 'Indien ingesteld, zal bij het maken van een nieuwe entiteit van dit type automatisch deze attribuutsjabloon worden toegepast.',
        'parent_attribute_template' => 'Dit attribuutsjabloon kan gerelateerd zijn aan een ander attribuutsjabloon. Bij het toepassen van deze attribuutsjabloon worden deze en al zijn bovenliggende entiteiten toegepast.',
    ],
    'index'                 => [
        'title' => 'Attribuutsjablonen',
    ],
    'placeholders'          => [
        'attribute_template'    => 'Kies een attribuutsjabloon',
        'name'                  => 'Naam van de attribuutsjabloon',
    ],
    'show'                  => [
        'tabs'  => [
            'attribute_templates'   => 'Attribuutsjablonen',
            'attributes'            => 'Attributen',
        ],
    ],
];
