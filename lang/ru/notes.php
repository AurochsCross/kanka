<?php

return [
    'create'        => [
        'title' => 'Новая заметка',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'is_pinned' => 'Закреплена',
        'note'      => 'Родительская заметка',
        'notes'     => 'Подзаметки',
    ],
    'helpers'       => [
        'nested_without'    => 'Показаны все заметки без родительских заметок. Нажмите на строку заметки, чтобы увидеть список ее подзаметок.',
    ],
    'hints'         => [
        'is_pinned' => 'В обзоре кампании можно закрепить не более 3 заметок.',
    ],
    'index'         => [],
    'placeholders'  => [
        'name'  => 'Название заметки',
        'note'  => 'Выберите родительскую заметку',
        'type'  => 'Религия, раса, политика',
    ],
    'show'          => [],
];
