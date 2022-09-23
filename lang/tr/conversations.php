<?php

return [
    'create'        => [
        'title' => 'Yeni Muhabbet',
    ],
    'destroy'       => [],
    'edit'          => [
        'title' => ':name Muhabbeti',
    ],
    'fields'        => [
        'messages'      => 'Mesajlar',
        'name'          => 'Ad',
        'participants'  => 'Katılımcılar',
        'target'        => 'Hedef',
        'type'          => 'Tür',
    ],
    'hints'         => [
        'participants'  => 'Lütfen sağ-üstteki :icon ikonuna tıklayarak muhabbetinize katılımcılar ekleyin.',
    ],
    'index'         => [
        'title' => 'Muhabbetler',
    ],
    'messages'      => [
        'destroy'       => [
            'success'   => 'Mesaj kaldırıldı.',
        ],
        'is_updated'    => 'Güncellendi',
        'load_previous' => 'Önceki mesajları yükle',
        'placeholders'  => [
            'message'   => 'Mesajınız',
        ],
    ],
    'participants'  => [
        'create'    => [
            'success'   => ':entity katılımcısı muhabbete eklendi.',
        ],
        'destroy'   => [
            'success'   => ':name katılımcısı muhabbetten kaldırıldı.',
        ],
        'modal'     => 'Katılımcılar',
        'title'     => ':name Katılımcıları',
    ],
    'placeholders'  => [
        'name'  => 'Muhabbetin adı',
        'type'  => 'Oyun İçi, Hazırlık, Plan',
    ],
    'show'          => [],
    'tabs'          => [
        'conversation'  => 'Muhabbet',
        'participants'  => 'Katılımcılar',
    ],
    'targets'       => [
        'characters'    => 'Karakterler',
        'members'       => 'Üyeler',
    ],
];
