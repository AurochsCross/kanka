<?php

return [
    'copy_mention'  => [
        'copy_with_name'    => 'Копировать продвинутое упоминание элемента',
        'success'           => 'Продвинутое упоминание элемента скопировано в буфер обмена.',
    ],
    'create'        => [
        'success'   => 'Элемент добавлен в хронологию.',
        'title'     => 'Новый элемент хронологии',
    ],
    'delete'        => [
        'success'   => 'Элемент ":name" удален.',
    ],
    'edit'          => [
        'success'   => 'Элемент обновлен.',
        'title'     => 'Редактирование элемента хронологии',
    ],
    'fields'        => [
        'date'              => 'Дата',
        'era'               => 'Эра',
        'icon'              => 'Иконка',
        'use_entity_entry'  => 'Показывать статью связанного объекта под элементом. Если у этого элемента есть текст, он будет показан выше статьи.',
    ],
    'helpers'       => [
        'entity_is_private' => 'Объект элемента скрыт.',
        'icon'              => 'Скопируйте HTML иконки с :fontawesome или :rpgawesome.',
        'is_collapsed'      => 'Элемент будет отображен свернутым по умолчанию.',
    ],
    'placeholders'  => [
        'date'      => 'Например 42-ое марта или 1332-1337',
        'name'      => 'Обязательно, если не выбран объект.',
        'position'  => 'Позиция в списке элементов эры. Оставьте пустым, чтобы добавить в конец.',
    ],
    'warning'       => [
        'editing'   => [
            'description'   => 'Кажется, в данный момент этот элемент хронологии редактирует кто-то другой! Вернуться назад или игнорировать предупреждение и продолжить, рискуя потерять данные? Элемент хронологии редактируют следующие участники:',
        ],
    ],
];
