<?php

return [
    'create'        => [
        'title' => 'Yeni Aile',
    ],
    'destroy'       => [],
    'edit'          => [],
    'families'      => [
        'title' => ':name Aileleri',
    ],
    'fields'        => [
        'families'  => 'Alt Aileler',
        'family'    => 'Ana Aile',
        'members'   => 'Üyeler',
    ],
    'helpers'       => [
        'descendants'   => 'Bu liste bu aileden gelen tüm aileleri içerir, yalnızca doğrudan altında olanları değil.',
    ],
    'hints'         => [
        'members'   => 'Aile üyeleri burada listelenir. Bir karakter bir aileye istenen karakteri düzenlerken "Aile" açılır listesi kullanılarak eklenebilir.',
    ],
    'index'         => [],
    'members'       => [
        'helpers'   => [
            'all_members'       => 'Aşağıdaki liste bu ailede ve bu aileden gelen ailelerde bulunan karakterlerin listesidir.',
            'direct_members'    => 'Pek çok aile onu yöneten ya da onu ünlü yapan üyelere sahiptir. Aşağıdaki liste doğrudan bu ailede olan karakterlerin listesidir.',
        ],
        'title'     => ':name Üyeleri',
    ],
    'placeholders'  => [
        'location'  => 'Bir konum seçin',
        'name'      => 'Ailenin adı',
        'type'      => 'Asil, Soylu, Soyu Kurumuş',
    ],
    'show'          => [
        'tabs'  => [
            'all_members'   => 'Tüm Üyeler',
            'families'      => 'Aileler',
            'members'       => 'Üyeler',
        ],
    ],
];
