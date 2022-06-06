<?php

return [
    'create'        => [
        'title' => 'Yeni Olay',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'date'      => 'Tarih',
        'image'     => 'Görsel',
        'location'  => 'Konum',
        'name'      => 'Ad',
        'type'      => 'Tür',
    ],
    'helpers'       => [
        'date'  => 'Bu alan her şeyi içinde bulundurabilir ve serüvenin takvimlerine bağlı değildir. Bu olayı bir takvime bağlamak için, olayı takvimde ya da bu olayın hatırlatıcılar sekmesinde ekleyin.',
    ],
    'index'         => [
        'title' => 'Olaylar',
    ],
    'placeholders'  => [
        'date'      => 'Olayınız için bir tarih',
        'location'  => 'Bir konum seçin',
        'name'      => 'Olayın adı',
        'type'      => 'Seremoni, Festival, Felaket, Savaş, Doğum',
    ],
    'show'          => [],
    'tabs'          => [
        'calendars' => 'Takvim Girdileri',
    ],
];
