<?php

return [
    'abilities'     => [
        'title' => ':name的子能力',
    ],
    'children'      => [
        'actions'       => [
            'add'   => '为实体添加能力',
        ],
        'create'        => [
            'success'   => '成功为实体添加了能力：:name',
            'title'     => '向:name添加实体',
        ],
        'description'   => '拥有此能力的实体',
        'title'         => '待修正1',
    ],
    'create'        => [
        'title' => '新能力',
    ],
    'destroy'       => [],
    'edit'          => [],
    'entities'      => [
        'title' => '拥有:name能力的实体',
    ],
    'fields'        => [
        'abilities' => '能力',
        'ability'   => '父能力',
        'charges'   => '充能',
    ],
    'helpers'       => [
        'descendants'       => '这个列表包含了所有派生自此能力的子能力。包括子能力的子能力...',
        'nested_without'    => '展示所有没有父能力的能力。点击某行来查看子能力。',
    ],
    'index'         => [],
    'placeholders'  => [
        'charges'   => '充能次数。参考{等级}*{魅力}',
        'name'      => '火球，警觉，精巧一击',
        'type'      => '咒文，武技，普攻',
    ],
    'show'          => [
        'tabs'  => [
            'abilities' => '能力',
            'entities'  => '实体',
        ],
    ],
];
