<?php

return [
    'abilities'     => [
        'title' => 'Потомки способности :name',
    ],
    'create'        => [
        'success'   => 'Способность ":name" создана',
        'title'     => 'Новая способность',
    ],
    'destroy'       => [
        'success'   => 'Способность ":name" удалена',
    ],
    'edit'          => [
        'success'   => 'Способность ":name" обновлена',
        'title'     => 'Редактирование способности :name',
    ],
    'entities'      => [
        'title' => 'Объекты со способностью :name',
    ],
    'fields'        => [
        'abilities' => 'Способности',
        'ability'   => 'Родительская способность',
        'charges'   => 'Заряды',
        'name'      => 'Название',
        'type'      => 'Тип',
    ],
    'helpers'       => [
        'descendants'   => 'Это список всех потомков этой способности, включая всех потомков ее потомков.',
        'nested_parent' => 'Показаны способности, входящие в :parent.',
        'nested_without'=> 'Показаны все способности, у которых нет родительских способностей. Нажмите на строку способности, чтобы увидеть список ее способностей-потомков.',
    ],
    'index'         => [
        'add'           => 'Новая способность',
        'description'   => 'Создавайте силы, заклинания, навыки и многое другое для своих объектов.',
        'header'        => 'Способности :name',
        'title'         => 'Способности',
    ],
    'placeholders'  => [
        'charges'   => 'Число зарядов. Для ссылки на атрибуты указывайте их {Названия} в круглых скобках',
        'name'      => 'Огненный шар, сигнал тревоги, коварный удар',
        'type'      => 'Заклинание, навык, атака',
    ],
    'show'          => [
        'tabs'  => [
            'abilities' => 'Способности',
            'entities'  => 'Объекты',
        ],
        'title' => 'Способность :name',
    ],
];
