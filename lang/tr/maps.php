<?php

return [
    'actions'       => [
        'back'      => ':name Sayfasına Geri Dön',
        'edit'      => 'Haritayı düzenle',
        'explore'   => 'Keşfet',
    ],
    'create'        => [
        'title' => 'Yeni Harita',
    ],
    'destroy'       => [],
    'edit'          => [],
    'errors'        => [
        'dashboard' => [
            'missing'   => 'Bu haritanın kontrol panelinde görüntülenebilmesi için bir görsele ihtiyacı var.',
        ],
        'explore'   => [
            'missing'   => 'Haritayı keşfedebilmek için önce lütfen haritaya bir görsel ekleyin.',
        ],
    ],
    'fields'        => [
        'center_x'      => 'Varsayılan Boylam Konumu',
        'center_y'      => 'Varsayılan Enlem Konumu',
        'grid'          => 'Izgara',
        'initial_zoom'  => 'Temel yakınlaştırma',
        'map'           => 'Ana Harita',
        'maps'          => 'Haritalar',
        'max_zoom'      => 'Azami yakınlaştırma',
        'min_zoom'      => 'Asgari yakınlaştırma',
    ],
    'helpers'       => [
        'center'            => 'Aşağıdaki değerleri değiştirmek haritanın hangi alanına odaklanıldığını kontrol eder. Bu değerleri boş bırakmak haritanın merkezine odaklanılmasına sebep olur.',
        'descendants'       => 'Bu liste bu haritadan gelen tüm haritaları içerir, yalnızca doğrudan altında olanları değil.',
        'distance_measure'  => 'Haritaya bir uzaklık ölçüsü vermek keşif modunda ölçü aletini kullanmanıza olanak sağlar.',
        'grid'              => 'Keşif modunda görüntülenecek ızgara için bir boyut belirleyin.',
        'initial_zoom'      => 'Haritanın beraberinde yüklendiği temel yakınlaştırma oranı. Varsayılan değer :default, izin verilen azami değer :max, ve izin verilen asgari değer :min',
        'max_zoom'          => 'Bir haritanın en fazla ne kadar yakınlaştırılabileceği. Varsayılan değer :default, izin verilen en yüksek değer ise :max',
        'min_zoom'          => 'Bir haritanın en fazla ne kadar uzaklaştırılabileceği. Varsayılan değer :default, izin verilen en yüksek değer ise :max',
        'missing_image'     => 'Katmanlar ve işaretler ekleyebilmek için önce haritayı bir görsel ile birlikte kaydedin.',
    ],
    'index'         => [],
    'maps'          => [
        'title' => ':name Haritaları',
    ],
    'panels'        => [
        'groups'    => 'Gruplar',
        'layers'    => 'Katmanlar',
        'markers'   => 'İşaretler',
        'settings'  => 'Ayarlar',
    ],
    'placeholders'  => [
        'center_x'  => 'Haritayı ortada yüklemek için boş bırakın',
        'center_y'  => 'Haritayı ortada yüklemek için boş bırakın',
        'grid'      => 'Izgara bölümleri arasında piksel türünden mesafe. Izgarayı saklamak için boş bırakın.',
        'name'      => 'Haritanın adı',
        'type'      => 'Zindan, Şehir, Galaksi',
    ],
    'show'          => [
        'tabs'  => [
            'maps'  => 'Haritalar',
        ],
    ],
];
