<?php

return [
    'attribute_templates'   => [
        'title' => ':name özellik taslakları',
    ],
    'create'                => [
        'title' => 'Yeni Özellik Taslağı',
    ],
    'destroy'               => [],
    'edit'                  => [],
    'fields'                => [
        'attribute_template'    => 'Ana Özellik Taslağı',
        'attributes'            => 'Özellikler',
    ],
    'hints'                 => [
        'automatic'                 => 'Özellikler :link Özellik Taslağından otomatik olarak uygulanır.',
        'entity_type'               => 'Eğer seçilirse, bu türde yeni bir varlık yaratmak otomatik olarak bu taslağı ona uygular.',
        'parent_attribute_template' => 'Bu özellik taslağı başka bir özellik taslağının alt taslağı olabilir. Bu özellik taslağı uygulanırken, kendisi ve bütün üst taslakları uygulanacak.',
    ],
    'index'                 => [],
    'placeholders'          => [
        'attribute_template'    => 'Bir özellik taslağı seçin',
        'name'                  => 'Özellik Taslağının adı',
    ],
    'show'                  => [
        'tabs'  => [
            'attribute_templates'   => 'Özellik Taslakları',
            'attributes'            => 'Özellikler',
        ],
    ],
];
