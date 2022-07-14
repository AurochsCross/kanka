<?php

return [
    'actions'       => [
        'back'      => 'Назад к :name',
        'edit'      => 'Редактировать карту',
        'explore'   => 'Исследовать',
    ],
    'create'        => [
        'title' => 'Новая карта',
    ],
    'destroy'       => [],
    'edit'          => [],
    'errors'        => [
        'dashboard' => [
            'missing'   => 'Чтобы отобразить карту в обзоре кампании, ей нужно изображение.',
        ],
        'explore'   => [
            'missing'   => 'Чтобы исследовать карту, добавьте ей изображение.',
        ],
    ],
    'fields'        => [
        'center_marker' => 'Метка',
        'center_x'      => 'Долгота по умолчанию',
        'center_y'      => 'Широта по умолчанию',
        'centering'     => 'Центрирование',
        'grid'          => 'Сетка',
        'initial_zoom'  => 'Изначальное приближение',
        'is_real'       => 'Использовать OpenStreetMaps',
        'map'           => 'Родительская карта',
        'maps'          => 'Карты',
        'max_zoom'      => 'Максимальное приближение',
        'min_zoom'      => 'Минимальное приближение',
        'name'          => 'Название',
        'tabs'          => [
            'coordinates'   => 'Координаты',
            'marker'        => 'Метка',
        ],
        'type'          => 'Тип',
    ],
    'helpers'       => [
        'center'            => 'Следующие значения влияют на то, на какую часть карты фокус наведен изначально. Чтобы навести фокус на центр карты, оставьте эти поля пустыми.',
        'centering'         => 'Центрирование на метке не зависит от указанных координат по умолчанию.',
        'descendants'       => 'Этот список всех карт-потомков этой карты, а не только ее непосредственных потомков.',
        'distance_measure'  => 'Указание меры расстояния откроет инструмент измерения расстояний в режиме исследования.',
        'grid'              => 'Укажите размер сетки, отображаемой в режиме исследования.',
        'initial_zoom'      => 'Уровень приближения карты при ее загрузке. По умолчанию он равен :default, максимальное допустимое значение :max, а минимальное :min.',
        'is_real'           => 'Включите это, если хотите использовать карту реального мира, а не загруженную картинку. Это сделает слои недоступными.',
        'max_zoom'          => 'Максимальный уровень приближения карты. По умолчанию он равен :default, максимальное допустимое значение :max.',
        'min_zoom'          => 'Минимальный уровень приближения карты. По умолчанию он равен :default, минимальное допустимое значение это :min.',
        'missing_image'     => 'Добавьте карте изображение и сохраните ее, чтобы получить возможность добавлять слои и метки.',
        'nested_without'    => 'Показаны все карты, у которых нет родительских карт. Нажмите на ряд карты, чтобы увидеть список ее карт-потомков.',
    ],
    'index'         => [
        'title' => 'Карты',
    ],
    'maps'          => [
        'title' => 'Карты :name',
    ],
    'panels'        => [
        'groups'    => 'Группы',
        'layers'    => 'Слои',
        'markers'   => 'Метки',
        'settings'  => 'Настройки',
    ],
    'placeholders'  => [
        'center_marker' => 'Чтобы центрировать карту на середину, оставьте поле пустым.',
        'center_x'      => 'Чтобы центрировать карту на середину, оставьте поле пустым.',
        'center_y'      => 'Чтобы центрировать карту на середину, оставьте поле пустым.',
        'grid'          => 'Расстояние в пикселях между линиями сетки. Пусто - нет сетки.',
        'name'          => 'Название карты',
        'type'          => 'Подземелье, город, галактика',
    ],
    'show'          => [
        'tabs'  => [
            'maps'  => 'Карты',
        ],
    ],
];
