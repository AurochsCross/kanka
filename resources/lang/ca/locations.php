<?php

return [
    'characters'    => [
        'title' => 'Personatges a :name',
    ],
    'create'        => [
        'title' => 'Nou indret',
    ],
    'destroy'       => [],
    'edit'          => [],
    'events'        => [
        'title' => 'Esdeveniments a :name',
    ],
    'families'      => [
        'title' => 'Famílies a :name',
    ],
    'fields'        => [
        'characters'        => 'Personatges',
        'image'             => 'Imatge',
        'is_map_private'    => 'Mapa privat',
        'location'          => 'Localizació superior',
        'locations'         => 'Indrets',
        'map'               => 'Mapa',
        'name'              => 'Nom',
        'type'              => 'Tipus',
    ],
    'helpers'       => [
        'characters'        => 'Mostra tots els personatges d\'aquest indret i els seus indrets niats, o només els que són aquí.',
        'descendants'       => 'Aquí es mostren totes les localitzacions que són descendents d\'aquests indrets, a més de les directament inferiors.',
        'families'          => 'Hi ha indrets on s\'assenten poderoses famílies.',
        'map'               => 'En afegir un mapa a un indret, s\'hi poden crear punts i enllaçar-los a altres entitats de la campanya.',
        'map_deprecated_2'  => 'Ara els mapes són un mòdul per si mateixos! Aquesta nova funció està actualment disponible com a accés anticipat a les :boosted. La interfície prèvia deixarà d\'estar disponible quan s\'obri l\'accés al nou mòdul, però continuareu podent editar mapes antics.',
        'nested_without'    => 'S\'estan mostrant els indrets sense pare. Feu clic a la fila d\'un indret per a mostrar-ne els descendents.',
        'organisations'     => 'Veu totes les organitzacions d\'aquest indret i les seves sublocalizaciones, o només les que estan directament aquí.',
    ],
    'hints'         => [
        'is_map_private'    => 'Un mapa privat només és visible per als administradors.',
    ],
    'index'         => [
        'title' => 'Indrets',
    ],
    'items'         => [],
    'journals'      => [],
    'locations'     => [
        'title' => 'Indrets de :name',
    ],
    'map'           => [
        'actions'   => [
            'admin_mode'        => 'Habilita el mode d\'edició',
            'big'               => 'Vista completa',
            'confirm_delete'    => 'Segur que voleu eliminar aquest punt del mapa?',
            'download'          => 'Descarrega',
            'points'            => 'Edita els punts',
            'toggle_hide'       => 'Amaga els punts',
            'toggle_show'       => 'Mostra els punts',
            'view_mode'         => 'Torna al mode de vista',
            'zoom_in'           => 'Apropa',
            'zoom_out'          => 'Allunya',
            'zoom_reset'        => 'Reseteja el zoom',
        ],
        'helper'    => 'Cliqueu al mapa per a afegir un nou punt a una localització, o seleccioneu un punt existent per a editar-lo o eliminar-lo.',
        'helpers'   => [
            'admin' => 'Activeu-ho per a habilitar la creació de nous punts només fent clic al mapa, editar-los en seleccionar-los i moure\'ls fàcilment.',
            'info'  => 'Més informació sobre els mapes.',
            'label' => 'Aquest punt és una descripció. Ni més ni menys.',
            'view'  => 'Cliqueu a qualsevol punt del mapa per a veure\'n els detalls. Useu Ctrl+Rodeta per a acostar-se i allunyar-se del mapa.',
        ],
        'legend'    => 'Llegenda',
        'modal'     => [
            'submit'    => 'Afegeix',
            'title'     => 'Nou punt',
        ],
        'no_map'    => 'Editeu l\'indret per a afegir-hi un mapa. Un cop l\'hagueu pujat, apareixerà aquí.',
        'points'    => [
            'empty_label'   => 'Punt sense nom',
            'fields'        => [
                'axis_x'    => 'Eix X',
                'axis_y'    => 'Eix Y',
                'colour'    => 'Color',
                'icon'      => 'Icona',
                'name'      => 'Nom',
                'shape'     => 'Forma',
                'size'      => 'Grandària',
            ],
            'helpers'       => [
                'location_or_name'  => 'Un punt del mapa pot dirigir a una localització existent, o simplement tenir una etiqueta.',
            ],
            'icons'         => [
                'anchor'        => 'Àncora',
                'anvil'         => 'Enclusa',
                'apple'         => 'Poma',
                'aura'          => 'Aura',
                'axe'           => 'Destral',
                'beer'          => 'Cervesa',
                'biohazard'     => 'Perill biològic',
                'book'          => 'Llibre',
                'bridge'        => 'Pont',
                'campfire'      => 'Foguera',
                'candle'        => 'Espelma',
                'capitol'       => 'Capitoli',
                'castle-emblem' => 'Castell',
                'cat'           => 'Gat',
                'cheese'        => 'Formatge',
                'cog'           => 'Engranatge',
                'crown'         => 'Corona',
                'dead-tree'     => 'Arbre mort',
                'diamond'       => 'Diamant',
                'dragon'        => 'Drac',
                'emerald'       => 'Maragda',
                'entity'        => 'Imatgen de l\'entitat',
                'fire'          => 'Foc',
                'flask'         => 'Flascó',
                'flower'        => 'Flor',
                'horseshoe'     => 'Ferradura',
                'hourglass'     => 'Rellotge de sorra',
                'hydra'         => 'Hidra',
                'kaleidoscope'  => 'Caleidoscopi',
                'key'           => 'Clau',
                'lever'         => 'Palanca',
                'meat'          => 'Carn',
                'octopus'       => 'Pop',
                'palm-tree'     => 'Palmera',
                'pin'           => 'Xinxeta',
                'pine-tree'     => 'Pi',
                'player'        => 'Personatge',
                'potion'        => 'Poció',
                'reactor'       => 'Reactor',
                'repair'        => 'Eines',
                'sheep'         => 'Ovella',
                'shield'        => 'Escut',
                'skull'         => 'Calavera',
                'snake'         => 'Serp',
                'spades-card'   => 'Carta de pòquer',
                'sprout'        => 'Brot',
                'sun'           => 'Sol',
                'tentacle'      => 'Tentacle',
                'toast'         => 'Torrada',
                'tombstone'     => 'Làpida',
                'torch'         => 'Torxa',
                'tower'         => 'Torre',
                'vase'          => 'Gerro',
                'water-drop'    => 'Aigua',
                'wooden-sign'   => 'Cartell de fusta',
                'wrench'        => 'Clau anglesa',
            ],
            'modal'         => 'Crea o edita un punt del mapa',
            'placeholders'  => [
                'axis_x'    => 'Posició esquerra',
                'axis_y'    => 'Posició superior',
                'name'      => 'Etiqueta del punt quan no s\'ha establert cap localització.',
            ],
            'return'        => 'Torna a :name',
            'shapes'        => [
                'circle'    => 'Cercle',
                'custom'    => 'Personalitzada',
                'square'    => 'Quadrat',
            ],
            'sizes'         => [
                'custom'    => 'Personalitzada',
                'huge'      => 'Enorme',
                'large'     => 'Gran',
                'small'     => 'Pequeño',
                'standard'  => 'Estàndard',
                'tiny'      => 'Mini',
            ],
            'success'       => [
                'create'    => 'S\'ha creat el punt al mapa.',
                'delete'    => 'S\'ha tret el punt del mapa.',
                'update'    => 'S\'ha actualitzat el punt del mapa.',
            ],
            'title'         => 'Punts del mapa de :name',
        ],
        'success'   => 'S\'han guardat els punts del mapa.',
    ],
    'maps'          => [
        'title' => 'Mapes de :name',
    ],
    'organisations' => [
        'title' => 'Organitzacions de :name',
    ],
    'panels'        => [
        'map'   => 'Mapa',
    ],
    'placeholders'  => [
        'location'  => 'Trieu l\'indret superior',
        'name'      => 'Nom de l\'indret',
        'type'      => 'Ciutat, regne, ruïnes...',
    ],
    'show'          => [
        'tabs'  => [
            'characters'    => 'Personatges',
            'locations'     => 'Indrets',
            'map'           => 'Mapa',
            'maps'          => 'Mapes',
        ],
    ],
];
