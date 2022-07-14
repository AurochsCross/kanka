<?php

return [
    'actions'                   => [
        'actions'           => 'Műveletek',
        'apply'             => 'Alkalmaz',
        'back'              => 'Vissza',
        'copy'              => 'Másolás',
        'copy_mention'      => 'Említett [ ] másolása',
        'copy_to_campaign'  => 'Másolás Kampányba',
        'explore_view'      => 'Hierarchikus nézet',
        'export'            => 'Export (pdf)',
        'find_out_more'     => 'Tudj meg többet!',
        'go_to'             => 'Ugrás :name entitáshoz',
        'json-export'       => 'Exportálás (json)',
        'manage_links'      => 'Linkek kezelése',
        'move'              => 'Mozgatás',
        'new'               => 'Új',
        'new_post'          => 'Új entitás bejegyzés',
        'next'              => 'Következő',
        'reset'             => 'Visszaállítás',
        'transform'         => 'Transzformálás',
    ],
    'add'                       => 'Hozzáadás',
    'alerts'                    => [
        'copy_attribute'    => 'A tulajdonság említését átmásoltuk a vágólapodra.',
        'copy_mention'      => 'Az entitás említését átmásoltuk a vágólapodra.',
    ],
    'boosted'                   => 'Kiemelt',
    'boosted_campaigns'         => 'Kiemelt kampányok',
    'bulk'                      => [
        'actions'       => [
            'edit'  => 'Tömeges szerkesztés, és címkézés',
        ],
        'age'           => [
            'helper'    => 'Használhatod a + és - gombokat a szám előtt, hogy frissítsd a korát az adott számmal.',
        ],
        'delete'        => [
            'warning'   => 'Biztosan törölni szeretnéd a kijelölt entitásokat?',
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
            'admin'     => 'Csak a kampány adminjai tudják megváltoztatni egy entitás privát státuszát.',
            'general'   => 'Hiba lépett fel a művelet feldolgozása közben. Kérlek próbáld újra, és vedd fel velünk a kapcsolatot, ha a probléma továbbra is fennáll. Hibaüzenet: :hint.',
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
            'copy_to_campaign'  => '{1} :count entitásból másolat jött létre itt: :campaign.|[2,*] :count entitásból másolat jött létre itt: :campaign.',
            'editing'           => '{1} :count entitás frissült.|[2,*] :count entitás frissült.',
            'permissions'       => '{1} Jogosultságok változtak meg meg :count entitás esetén.|[2,*]Jogosultságok változtak meg :count entitás esetén.',
            'private'           => ':count entitás most már privát|:count entitás most már privát.',
            'public'            => ':count entitás most már látható|:count entitás most már látható.',
            'templates'         => '{1} :count entitás alkalmazta a sablont.|[2,*] :count entitás alkalmazta a sablont.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Az entitások megtöbbszörözéséhez alkalmazd a sablont',
    ],
    'cancel'                    => 'Mégse',
    'click_modal'               => [
        'close'     => 'Bezárás',
        'confirm'   => 'Megerősítés',
        'title'     => 'Igazold vissza az akciódat!',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Entitások másolása egy másik kampányba',
        'panel'         => 'Másolás',
        'title'         => '\':name\' másolása egy másik kampányba',
    ],
    'create'                    => 'Létrehozás',
    'datagrid'                  => [
        'empty' => 'Nincs megjeleníthető adat',
    ],
    'delete_modal'              => [
        'close' => 'Bezárás',
        'delete'=> 'Törlés',
        'title' => 'Törlés megerősítése',
    ],
    'destroy_many'              => [
        'success'   => ':count entitást töröltünk|:count entitást töröltünk.',
    ],
    'edit'                      => 'Szerkesztés',
    'errors'                    => [
        'boosted'                       => 'Ez a lehetőség csak a kiemelt kampányokban érhető el.',
        'boosted_campaigns'             => 'Ez a lehetőség csak :boosted számára elérhető.',
        'node_must_not_be_a_descendant' => 'Érvénytelen csomópont (címke, előd helyszín): saját maga leszármazottja lehet.',
        'unavailable_feature'           => 'Nem elérhető lehetőség.',
    ],
    'events'                    => [],
    'export'                    => 'Export',
    'fields'                    => [
        'ability'               => 'Képesség',
        'attribute_template'    => 'Tulajdonságsablon',
        'calendar'              => 'Naptár',
        'calendar_date'         => 'Naptári dátum',
        'character'             => 'Karakter',
        'child'                 => 'Gyermek',
        'closed'                => 'Lezárt',
        'colour'                => 'Szín',
        'copy_abilities'        => 'Képességek másolása',
        'copy_attributes'       => 'Tulajdonságok másolása',
        'copy_inventory'        => 'Felszerelés másolása',
        'copy_links'            => 'Entitás linkjeinek másolása',
        'creator'               => 'Létrehozó',
        'dice_roll'             => 'Dobás',
        'entity'                => 'Entitás',
        'entity_type'           => 'Entitás Típusa',
        'entry'                 => 'Bejegyzés',
        'event'                 => 'Esemény',
        'excerpt'               => 'Kivonat',
        'family'                => 'Család',
        'files'                 => 'Állományok',
        'gallery_header'        => 'Galéria fejléc',
        'gallery_image'         => 'Galériakép',
        'has_entity_files'      => 'Van állománya az entitásnak',
        'has_entity_notes'      => 'Van bejegyzése az entitásnak',
        'has_image'             => 'Rendelkezik képpel',
        'header_image'          => 'Fejléc kép',
        'image'                 => 'Kép',
        'is_closed'             => 'A beszélgetést lezárjuk, és nem fogadhat új hozzászólást.',
        'is_private'            => 'Privát',
        'is_star'               => 'Kitűzve',
        'item'                  => 'Tárgy',
        'journal'               => 'Napló',
        'location'              => 'Helyszín',
        'locations'             => ':first itt: :second',
        'map'                   => 'Térkép',
        'name'                  => 'Név',
        'organisation'          => 'Szervezet',
        'position'              => 'Elhelyezkedés',
        'privacy'               => 'Titoktartás',
        'race'                  => 'Faj',
        'tag'                   => 'Címke',
        'tags'                  => 'Címkék',
        'timeline'              => 'Idővonal',
        'tooltip'               => 'Tooltip',
        'type'                  => 'Típus',
        'visibility'            => 'Láthatóság',
    ],
    'files'                     => [
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
    'filter'                    => 'Szűrő',
    'filters'                   => [
        'all'                       => 'Szűrés minden leszármazottra',
        'clear'                     => 'Szűrők törlése',
        'copy_helper'               => 'A vágólapodon lévő szűrőket használd értékként a főoldal widgetjeinek és gyors linkjeinek szűrőihez.',
        'copy_helper_no_filters'    => 'Először definiálj néhány szűrőt, hogy utána a vágólapodra másolhasd azokat.',
        'copy_to_clipboard'         => 'Szűrők másolása a vágólapra',
        'direct'                    => 'Szűrés közvetlen leszármazottakra',
        'filtered'                  => ':count :entity a(z) :total elemből',
        'hide'                      => 'Szűrők elrejtése',
        'lists'                     => [
            'desktop'   => [
                'all'       => 'Minden leszármazott megmutatása (:count)',
                'filtered'  => 'Közvetlen leszármazottak megmutatása (:count)',
            ],
            'mobile'    => [
                'all'       => 'Összes megmutatása (:count)',
                'filtered'  => 'Közvetlen megmutatása (:count)',
            ],
        ],
        'mobile'                    => [
            'clear' => 'Üres',
            'copy'  => 'Vágólap',
        ],
        'options'                   => [
            'exclude'   => 'Nem tartalmazza',
            'include'   => 'Tartalmazza',
            'none'      => 'Nincs',
        ],
        'show'                      => 'Szűrők megmutatása',
        'sorting'                   => [
            'asc'       => ':field Növekvő sorrend',
            'desc'      => ':field Csökkenő sorrend',
            'helper'    => 'A találatok megjelenítésének sorrendje.',
        ],
        'title'                     => 'Szűrők',
    ],
    'fix-this-issue'            => 'Rendezd el ezt az ügyet',
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Naptári dátum hozzáadása',
        ],
        'copy_options'  => 'Másolási lehetőségek',
    ],
    'helpers'                   => [
        'copy_options'  => 'Másold a következő kapcsolódó elemeket a forrásból az új entitásba.',
    ],
    'hidden'                    => 'Rejtett',
    'hints'                     => [
        'attribute_template'    => 'Közvetlenül is alkalmazhatsz egy tulajdonságsablont, amikor létrehozod ezt az entitást.',
        'calendar_date'         => 'Egy naptári dátum könnyű szűrést tesz lehetővé a listákban, és fenntart egy naptári eseményt is a választott naptárban.',
        'gallery_header'        => 'Ha az entitásnak nincs fejléce, tegyél ki egy képet a kampány galériájából.',
        'gallery_image'         => 'Ha az entitásnak nincs képe, tegyél ki egy képet a kampány galériájából.',
        'header_image'          => 'Ez a kép az entitás fölött fog megjelenni. Érdemes széles képet választani.',
        'image_limitations'     => 'Támogatott formátumok: :formats. Maximális állományméret: :size.',
        'image_patreon'         => 'Megnöveled az állományméret korlátját?',
        'is_star'               => 'Kitűzött elemek az entitás menüjén jelennek meg',
        'tooltip'               => 'Lecseréli az automatikusan generált tooltip szöveget az alábbi tartalommal.',
        'visibility'            => 'Ha a láthatóságot Admin-ra állítod, akkor csak az Admin jogú felhasználók tudják megnézni ezt. \'Magam\'-ra állítva csak te láthatod.',
    ],
    'history'                   => [
        'unknown'   => 'Ismeretlen',
        'view'      => 'Entitásnapló megtekintése',
    ],
    'image'                     => [
        'error' => 'Nem érjük el a kívánt képet. Lehet, hogy a honlap nem engedi, hogy letöltsük a képet (ilyen a Squarespace és a DeviantArt), vagy a link nem érvényes már. Kérjük, arról is bizonyosodj meg, hogy a kép nem nagyobb, mint :size.',
    ],
    'is_not_private'            => 'Ez az entitás jelenleg nem privát.',
    'is_private'                => 'Ez az entitás privát, így nem látható a nem-admin felhasználók számára.',
    'legacy'                    => 'Örökség',
    'linking_help'              => 'Hogyan hozhatok létre linket más entitásokhoz?',
    'manage'                    => 'Kezelés',
    'navigation'                => [
        'cancel'    => 'megszakítás',
        'or_cancel' => 'vagy :cancel',
    ],
    'new_entity'                => [
        'error' => 'Kérjük, nézd meg jól az értékeket!',
        'fields'=> [
            'name'  => 'Név',
        ],
        'title' => 'Új entitás',
    ],
    'panels'                    => [
        'appearance'            => 'Megjelenés',
        'attribute_template'    => 'Tulajdonságsablon',
        'calendar_date'         => 'Naptári dátum',
        'entry'                 => 'Bejegyzés',
        'general_information'   => 'Általános információ',
        'move'                  => 'Mozgatás',
        'system'                => 'Rendszer',
    ],
    'permissions'               => [
        'action'            => 'Akció',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Hozzáadás',
                'deny'      => 'Tilt',
                'ignore'    => 'Figyelmen kívül hagyás',
                'remove'    => 'Eltávolítás',
            ],
            'bulk_entity'   => [
                'allow'     => 'Engedélyez',
                'deny'      => 'Tilt',
                'inherit'   => 'Örököl',
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
        'helper'            => 'Használd ezt a felületet, hogy finomhangold, melyik felhasználó és szerep tud kapcsolatba lépni ezzel az entitással. :allow',
        'helpers'           => [
            'setup' => 'Használd ezt a felületet, hogy finomhangold, melyik felhasználó és szerep tud kapcsolatba lépni ezzel az entitással. :allow engedélyezni fogja a felhasználó, vagy a szerep birtokosa számára, ennek a műveletnek az elvégzését. :deny megtiltja hogy ezt a műveletet végezhessék. :inherit beállítás esetén pedig a felhasználó szerepét, vagy fő szerepének jogosultságát fogja figyelembe venni. Egy felhasználói szinten beállított :allow jog engedélyt fog adni a művelet elvégzésére, még akkor is, ha a felhasználó szerepköre :deny-aná ezt.',
        ],
        'inherited'         => 'Ez a szerep már rendelkezik ezzel a jogosultsággal ehhez a típusú entitáshoz.',
        'inherited_by'      => 'Ez a felhasználó tagja a \':role\' szerepnek, amely rendelkezik jogosultsággal ezen az entitás típuson.',
        'success'           => 'Engedélyeket elmentettük.',
        'title'             => 'Engedélyek',
        'too_many_members'  => 'A kampánynak túl sok tagja (>10) van ahhoz, hogy kijelezzük ezen a felületen. Kérjük, használd az entitás nézetben az Engedély gombot, hogy kezeld az engedélyek részleteit.',
    ],
    'placeholders'              => [
        'ability'       => 'Válassz egy képességet',
        'calendar'      => 'Válassz egy naptárat!',
        'character'     => 'Válassz egy karaktert!',
        'entity'        => 'Entitás',
        'event'         => 'Válassz egy eseményt!',
        'family'        => 'Válassz egy családot!',
        'gallery_image' => 'Válassz egy képet a kampánygalériából',
        'image_url'     => 'Egy URL-címről is feltölthetsz képet',
        'item'          => 'Válassz egy tárgyat!',
        'journal'       => 'Válassz egy naplót',
        'location'      => 'Válassz egy helyszínt!',
        'map'           => 'Válassz térképet!',
        'note'          => 'Válassz egy bejegyzést',
        'organisation'  => 'Válassz egy szervezetet!',
        'quest'         => 'Válassz egy küldetést',
        'race'          => 'Válassz egy fajt!',
        'tag'           => 'Válassz egy címkét!',
        'timeline'      => 'Válassz egy idővonalat',
    ],
    'relations'                 => [
        'fields'    => [
            'location'  => 'Helyszín',
            'name'      => 'Név',
            'relation'  => 'Kapcsolat',
        ],
        'hint'      => 'Az entitások közötti kapcsolatok segítenek meghatározni a viszonyukat.',
    ],
    'remove'                    => 'Eltávolítás',
    'rename'                    => 'Átnevezés',
    'save'                      => 'Mentés',
    'save_and_close'            => 'Mentés és bezárás',
    'save_and_copy'             => 'Mentés és másolás',
    'save_and_new'              => 'Mentés és új',
    'save_and_update'           => 'Mentés és frissítés',
    'save_and_view'             => 'Mentés és megtekintés',
    'search'                    => 'Keresés',
    'select'                    => 'Kiválasztás',
    'superboosted_campaigns'    => 'Szupermegerősített kapmány',
    'tabs'                      => [
        'abilities'     => 'Képességek',
        'assets'        => 'Eszközök',
        'attributes'    => 'Tulajdonságok',
        'boost'         => 'Boost',
        'calendars'     => 'Naptárak',
        'connections'   => 'Kapcsolatok',
        'default'       => 'Alapértelmezett',
        'events'        => 'Események',
        'inventory'     => 'Felszerelés',
        'links'         => 'Linkek',
        'map-points'    => 'Térképi pontok',
        'mentions'      => 'Említések',
        'menu'          => 'Menü',
        'notes'         => 'Jegyzetek',
        'permissions'   => 'Engedélyek',
        'profile'       => 'Profil',
        'quests'        => 'Küldetés',
        'relations'     => 'Kapcsolatok',
        'reminders'     => 'Emlékeztetők',
        'story'         => 'Történet',
        'timelines'     => 'Idővonalak',
        'tooltip'       => 'Tooltip',
    ],
    'update'                    => 'Frissítés',
    'users'                     => [
        'unknown'   => 'Ismeretlen',
    ],
    'view'                      => 'Megtekintés',
    'visibilities'              => [
        'admin'         => 'Admin',
        'admin-self'    => 'Magam és az admin',
        'all'           => 'Mindenki',
        'members'       => 'Tagok',
        'self'          => 'Magam',
    ],
];
