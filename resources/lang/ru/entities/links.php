<?php

return [
    'actions'       => [
        'add'   => 'Добавить ссылку',
    ],
    'create'        => [
        'success'   => 'Ссылка ":name" добавлена объекту ":entity".',
        'title'     => 'Новая ссылка объекта :name',
    ],
    'destroy'       => [
        'success'   => 'Ссылка ":name" удалена из объекта ":entity".',
    ],
    'fields'        => [
        'icon'      => 'Иконка',
        'name'      => 'Название',
        'position'  => 'Позиция',
        'url'       => 'URL адрес',
    ],
    'helpers'       => [
        'goto'      => 'Перейти по ссылке :name',
        'icon'      => 'Можете назначить иконку для ссылки. Используйте любые бесплатные иконки с :fontawesome или оставьте поле пустым, чтобы использовать стандартную.',
        'leaving'   => 'Вы собираетесь покинуть Kanka и перейти в другой домен. Страница, куда вы переходите, предоставлена пользователем и не проверяется нашим сайтом.',
        'url'       => 'Вы собираетесь перейти по адресу :url.',
    ],
    'placeholders'  => [
        'name'  => 'DNDBeyond',
        'url'   => 'https://dndbeyond.com/character-url',
    ],
    'show'          => [
        'helper'    => 'В усиленных кампаниях объектам можно добавлять ссылки на другие сайты.',
        'title'     => 'Ссылки объекта :name',
    ],
    'unboosted'     => [
        'text'  => 'Возможностью добавлять ссылки на сторонние ресурсы обладают только :boosted-campaigns.',
        'title' => 'Функция усиленных кампаний',
    ],
    'update'        => [
        'success'   => 'Ссылка ":name" объекта ":entity" обновлена.',
        'title'     => 'Обновление ссылки объекта :name',
    ],
];
