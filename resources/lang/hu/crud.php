<?php

return [
    'actions'           => [
        'actions'           => 'Akciók',
        'apply'             => 'Alkalmaz',
        'back'              => 'Vissza',
        'copy'              => 'Másolás',
        'copy_mention'      => 'Említett [ ] másolása',
        'copy_to_campaign'  => 'Másolás Kampányba',
        'explore_view'      => 'Hierarchikus nézet',
        'export'            => 'Export',
        'find_out_more'     => 'Tudj meg többet!',
        'go_to'             => 'Ugrás :name entitáshoz',
        'more'              => 'Több művelet',
        'move'              => 'Mozgatás',
        'new'               => 'Új',
        'next'              => 'Következő',
        'private'           => 'Privát',
        'public'            => 'Nyilvános',
    ],
    'add'               => 'Hozzáadás',
    'alerts'            => [
        'copy_mention'  => 'Az entitás említését átmásoltuk a vágólapodra.',
    ],
    'attributes'        => [
        'actions'       => [
            'add'               => 'Tulajdonság hozzáadása',
            'add_block'         => 'Blokk hozzáadása',
            'add_checkbox'      => 'Jelölőnégyzet hozzáadása',
            'add_text'          => 'Szöveg hozzáadása',
            'apply_template'    => 'Tulajdonságsablon alkalmazása',
            'manage'            => 'Kezelés',
            'remove_all'        => 'Összes törlése',
        ],
        'create'        => [
            'description'   => 'Új tulajdonság létrehozása',
            'success'       => ':name tulajdonságot hozzáadtuk :entity entitáshoz.',
            'title'         => ':name entitáshoz új tulajdonság hozzáadása',
        ],
        'destroy'       => [
            'success'   => ':entity :name tulajdonságát eltávolítottuk.',
        ],
        'edit'          => [
            'description'   => 'Létező entitás frissítése',
            'success'       => ':entity :name tulajdonságát frissítettük.',
            'title'         => ':name tulajdonságnak frissítése',
        ],
        'fields'        => [
            'attribute'             => 'Tulajdonság',
            'community_templates'   => 'Közösségi sablonok',
            'is_private'            => 'Privát Tulajdonságok',
            'is_star'               => 'Kitűzve',
            'template'              => 'Sablon',
            'value'                 => 'Érték',
        ],
        'helpers'       => [
            'delete_all'    => 'Biztosan ki akarod törölni az entitás összes tulajdonságát?',
        ],
        'hints'         => [
            'is_private'    => 'Elrejtheted egy entitás összes tulajdonságát az összes, nem-admin szerepű felhasználó elől, úgy, hogy priváttá teszed őket.',
        ],
        'index'         => [
            'success'   => ':entity számára frissítettük a tulajdonságokat.',
            'title'     => 'Tulajdonságok :name számára',
        ],
        'placeholders'  => [
            'attribute' => 'Hódítások száma, Kihívási érték, kezdeményezés, népesség',
            'block'     => 'Blokk megnevezése',
            'checkbox'  => 'Jelölőnégyzet megnevezése',
            'section'   => 'Szakasz neve',
            'template'  => 'Válassz ki egy sablont!',
            'value'     => 'A tulajdonság értéke',
        ],
        'template'      => [
            'success'   => ':name tulajdonságsablont alkalmaztuk :entity entátáshoz.',
            'title'     => ':name számára tulajdonságsablon alkalmazása',
        ],
        'types'         => [
            'attribute' => 'Tulajdonság',
            'block'     => 'Blokk',
            'checkbox'  => 'Jelölőnégyzet',
            'section'   => 'Szakasz',
            'text'      => 'Többsoros szöveg',
        ],
        'visibility'    => [
            'entry'     => 'A tulajdonság megjelenik az entitás menüjén',
            'private'   => 'A tulajdonság csak az "Admin" szerepű tagok számára látható.',
            'public'    => 'A tulajdonság minden tag számára látható.',
            'tab'       => 'A tulajdonság csak a Tulajdonságok fülön jelenik meg.',
        ],
    ],
    'boosted'           => 'Boost-olt',
    'bulk'              => [
        'actions'       => [
            'edit'  => 'Tömeges szerkesztés, és címkézés',
        ],
        'edit'          => [
            'tagging'   => 'Címkézési esemény',
            'tags'      => [
                'add'       => 'Hozzáadás',
                'remove'    => 'Eltávolítás',
            ],
            'title'     => 'Több entitás együttes szerkesztése',
        ],
        'errors'        => [
            'admin' => 'Csak a kampány adminjai tudják megváltoztatni egy entitás privát státuszát.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Felülírás',
            ],
            'helpers'   => [
                'override'  => 'Bepipálás esetén a kijelölt entitásokra vonatkozó korábbi jogosultságok elvesznek, és teljesen felülírásra kerülnek ezekkel a jogosultságokkal. Ha nincs bepipálva, a most kijelölt jogosultságok egyszerűen csak hozzáadódnak a már meglévők mellé az egyes entitásoknál.',
            ],
            'title'     => 'Jogosultság változtatása több entitásra vonatkozóan',
        ],
        'success'       => [
            'editing'       => '{1} :count entitás frissült.|[2,*] :count entitás frissült.',
            'permissions'   => '{1} Jogosultságok változtak meg meg :count entitás esetén.|[2,*]Jogosultságok változtak meg :count entitás esetén.',
            'private'       => ':count entitás most már privát|:count entitás most már privát.',
            'public'        => ':count entitás most már látható|:count entitás most már látható.',
        ],
    ],
    'cancel'            => 'Mégse',
    'click_modal'       => [
        'close'     => 'Bezárás',
        'confirm'   => 'Megerősítés',
        'title'     => 'Igazold vissza az akciódat!',
    ],
    'copy_to_campaign'  => [
        'panel' => 'Másolás',
        'title' => '\':name\' másolása egy másik kampányba',
    ],
    'create'            => 'Létrehozás',
    'datagrid'          => [
        'empty' => 'Nincs megjeleníthető adat',
    ],
    'delete_modal'      => [
        'close'         => 'Bezárás',
        'delete'        => 'Törlés',
        'description'   => 'Biztos, hogy eltávolítod?',
        'mirrored'      => 'Tükörkapcsolat eltávolítása.',
        'title'         => 'Törlés megerősítése',
    ],
    'destroy_many'      => [
        'success'   => ':count entitást töröltünk|:count entitást töröltünk.',
    ],
    'edit'              => 'Szerkesztés',
    'errors'            => [
        'node_must_not_be_a_descendant' => 'Érvénytelen csomópont (címke, előd helyszín): saját maga leszármazottja lehet.',
    ],
    'events'            => [
        'hint'  => 'Ez egy lista minden naptárról, amihez ezt az entitást hozzáadták az "Esemény hozzáadása a naptárhoz" felületen.',
    ],
    'export'            => 'Export',
    'fields'            => [
        'attribute_template'    => 'Tulajdonságsablon',
        'calendar'              => 'Naptár',
        'calendar_date'         => 'Naptári dátum',
        'character'             => 'Karakter',
        'colour'                => 'Szín',
        'copy_attributes'       => 'Tulajdonság másolása',
        'copy_notes'            => 'Entitásjegyzetek másolása',
        'creator'               => 'Létrehozó',
        'dice_roll'             => 'Dobás',
        'entity'                => 'Entitás',
        'entity_type'           => 'Entitás Típusa',
        'entry'                 => 'Bejegyzés',
        'event'                 => 'Esemény',
        'excerpt'               => 'Kivonat',
        'family'                => 'Család',
        'files'                 => 'Állományok',
        'header_image'          => 'Fejléc kép',
        'image'                 => 'Kép',
        'is_private'            => 'Privát',
        'is_star'               => 'Kitűzve',
        'item'                  => 'Tárgy',
        'location'              => 'Helyszín',
        'name'                  => 'Név',
        'organisation'          => 'Szervezet',
        'race'                  => 'Faj',
        'tag'                   => 'Címke',
        'tags'                  => 'Címkék',
        'tooltip'               => 'Tooltip',
        'type'                  => 'Típus',
        'visibility'            => 'Láthatóság',
    ],
    'files'             => [
        'actions'   => [
            'drop'      => 'Klikkelj ide egy állomány hozzáadásához vagy kidobásához',
            'manage'    => 'Az entitás állományainak kezelése',
        ],
        'errors'    => [
            'max'       => 'Elérted az entitáshoz rendelhető állományok maximális számát (:max).',
            'no_files'  => 'Nincs állomány.',
        ],
        'files'     => 'Feltöltött állomány',
        'hints'     => [
            'limit'         => 'Minden entitáshoz maximum :max állomány tölthető fel.',
            'limitations'   => 'Támogatott formátumok: jpg, png, gif és pdf. Maximális méret: :size',
        ],
        'title'     => ':name állományai',
    ],
    'filter'            => 'Szűrő',
    'filters'           => [
        'all'       => 'Szűrés minden leszármazottra',
        'clear'     => 'Szűrők törlése',
        'direct'    => 'Szűrés közvetlen leszármazottakra',
        'filtered'  => ':count :entity a(z) :total elemből',
        'hide'      => 'Szűrők elrejtése',
        'show'      => 'Szűrők megmutatása',
        'sorting'   => [
            'asc'       => ':field Növekvő sorrend',
            'desc'      => ':field Csökkenő sorrend',
            'helper'    => 'A találatok megjelenítésének sorrendje.',
        ],
        'title'     => 'Szűrők',
    ],
    'forms'             => [
        'actions'       => [
            'calendar'  => 'Naptári dátum hozzáadása',
        ],
        'copy_options'  => 'Másolási lehetőségek',
    ],
    'hidden'            => 'Rejtett',
    'hints'             => [
        'attribute_template'    => 'Közvetlenül is alkalmazhatsz egy tulajdonságsablont, amikor létrehozod ezt az entitást.',
        'calendar_date'         => 'Egy naptári dátum könnyű szűrést tesz lehetővé a listákban, és fenntart egy naptári eseményt is a választott naptárban.',
        'header_image'          => 'Ez a kép az entitás fölött fog megjelenni. Érdemes széles képet választani.',
        'image_limitations'     => 'Támogatott formátumok: jpg, png és gif. Maximális állományméret: :size.',
        'image_patreon'         => 'Megnöveled az állományméret korlátját?',
        'is_private'            => 'Ha privátnak állítod be, ezt az entitást csak a kampány "Admin" szereplői fogják látni.',
        'is_star'               => 'Kitűzött elemek az entitás menüjén jelennek meg',
        'map_limitations'       => 'Támogatott formátumok: jpg, png, gif és svg. Maximális állományméret: :size.',
        'tooltip'               => 'Lecseréli az automatikusan generált tooltip szöveget az alábbi tartalommal.',
        'visibility'            => 'Ha a láthatóságot Admin-ra állítod, akkor csak az Admin jogú felhasználók tudják megnézni ezt. \'Magam\'-ra állítva csak te láthatod.',
    ],
    'history'           => [
        'created'   => 'Létrehozás: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'unknown'   => 'Ismeretlen',
        'updated'   => 'Utolsó módosítás: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'view'      => 'Entitásnapló megtekintése',
    ],
    'image'             => [
        'error' => 'Nem érjük el a kívánt képet. Lehet, hogy a honlap nem engedi, hogy letöltsük a képet (ilyen a Squarespace és a DeviantArt), vagy a link nem érvényes már. Kérjük, arról is bizonyosodj meg, hogy a kép nem nagyobb, mint :size.',
    ],
    'is_private'        => 'Ez az entitás privát, így nem látható a nem-admin felhasználók számára.',
    'linking_help'      => 'Hogyan hozhatok létre linket más entitásokhoz?',
    'manage'            => 'Kezelés',
    'move'              => [
        'description'   => 'Az entitás más helyre mozgatása',
        'errors'        => [
            'permission'        => 'Nincs engedélyed ilyen tipusú entitás létrehozására ebben a kampányban.',
            'same_campaign'     => 'Ki kell választanod egy másik kampányt, ahová az entitás szeretnéd mozgatni.',
            'unknown_campaign'  => 'Ismeretlen kampány.',
        ],
        'fields'        => [
            'campaign'  => 'Új kampány',
            'copy'      => 'Készíts másolatot',
            'target'    => 'Új típus',
        ],
        'hints'         => [
            'campaign'  => 'Megpróbálhatod egy másik kampányba mozgatni ezt az entitást.',
            'copy'      => 'Ezt válaszd ki, ha szeretnél egy másolatot készíteni az új kampányba.',
            'target'    => 'Kérjük, ne felejtsd el, hogy néhány adat elveszhet, amikor egy elemet az egyik típusból egy másikban mozgatod.',
        ],
        'success'       => '\':name\' entitást átmozgattuk.',
        'success_copy'  => '\':name\' entitást másoltuk.',
        'title'         => ':name mozgatása',
    ],
    'new_entity'        => [
        'error' => 'Kérjük, nézd meg jól az értékeket!',
        'fields'=> [
            'name'  => 'Név',
        ],
        'title' => 'Új entitás',
    ],
    'or_cancel'         => 'vagy <a href=":url">mégse</a>',
    'panels'            => [
        'appearance'            => 'Megjelenés',
        'attribute_template'    => 'Tulajdonságsablon',
        'calendar_date'         => 'Naptári dátum',
        'entry'                 => 'Bejegyzés',
        'general_information'   => 'Általános információ',
        'move'                  => 'Mozgatás',
        'system'                => 'Rendszer',
    ],
    'permissions'       => [
        'action'            => 'Akció',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Hozzáadás',
                'ignore'    => 'Figyelmen kívül hagyás',
                'remove'    => 'Eltávolítás',
            ],
            'delete'        => 'Törlés',
            'edit'          => 'Szerkesztés',
            'entity_note'   => 'Entitás jegyzetek',
            'read'          => 'Olvasás',
            'toggle'        => 'Átkapcsolás',
        ],
        'allowed'           => 'Engedélyezett',
        'fields'            => [
            'member'    => 'Tag',
            'role'      => 'Szerep',
        ],
        'helper'            => 'Használd ezt a felületet, hogy finomhangold, melyik felhasználó és szerep tud kapcsolatba lépni ezzel az entitással.',
        'inherited'         => 'Ez a szerep már rendelkezik ezzel a jogosultsággal ehhez a típusú entitáshoz.',
        'inherited_by'      => 'Ez a felhasználó tagja a \':role\' szerepnek, amely rendelkezik jogosultsággal ezen az entitás típuson.',
        'success'           => 'Engedélyeket elmentettük.',
        'title'             => 'Engedélyek',
        'too_many_members'  => 'A kampánynak túl sok tagja (>10) van ahhoz, hogy kijelezzük ezen a felületen. Kérjük, használd az entitás nézetben az Engedély gombot, hogy kezeld az engedélyek részleteit.',
    ],
    'placeholders'      => [
        'calendar'      => 'Válassz egy naptárat!',
        'character'     => 'Válassz egy karaktert!',
        'entity'        => 'Entitás',
        'event'         => 'Válassz egy eseményt!',
        'family'        => 'Válassz egy családot!',
        'image_url'     => 'Egy URL-címről is feltölthetsz képet',
        'item'          => 'Válassz egy tárgyat!',
        'location'      => 'Válassz egy helyszínt!',
        'organisation'  => 'Válassz egy szervezetet!',
        'race'          => 'Válassz egy fajt!',
        'tag'           => 'Válassz egy címkét!',
    ],
    'relations'         => [
        'actions'   => [
            'add'   => 'Hozz létre egy kapcsolatot',
        ],
        'fields'    => [
            'location'  => 'Helyszín',
            'name'      => 'Név',
            'relation'  => 'Kapcsolat',
        ],
        'hint'      => 'Az entitások közötti kapcsolatok segítenek meghatározni a viszonyukat.',
    ],
    'remove'            => 'Eltávolítás',
    'rename'            => 'Átnevezés',
    'save'              => 'Mentés',
    'save_and_close'    => 'Mentés és bezárás',
    'save_and_new'      => 'Mentés és új',
    'save_and_update'   => 'Mentés és frissítés',
    'save_and_view'     => 'Mentés és megtekintés',
    'search'            => 'Keresés',
    'select'            => 'Kiválasztás',
    'tabs'              => [
        'attributes'    => 'Tulajdonságok',
        'boost'         => 'Boost',
        'calendars'     => 'Naptárak',
        'default'       => 'Alapértelmezett',
        'events'        => 'Események',
        'inventory'     => 'Felszerelés',
        'map-points'    => 'Térképi pontok',
        'mentions'      => 'Említések',
        'menu'          => 'Menü',
        'notes'         => 'Jegyzetek',
        'permissions'   => 'Engedélyek',
        'relations'     => 'Kapcsolatok',
        'reminders'     => 'Emlékeztetők',
        'tooltip'       => 'Tooltip',
    ],
    'update'            => 'Frissítés',
    'users'             => [
        'unknown'   => 'Ismeretlen',
    ],
    'view'              => 'Megtekintés',
    'visibilities'      => [
        'admin' => 'Admin',
        'all'   => 'Mindenki',
        'self'  => 'Magam',
    ],
];
