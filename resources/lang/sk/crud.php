<?php

return [
    'actions'           => [
        'apply'             => 'Použiť',
        'back'              => 'Naspäť',
        'copy'              => 'Kopírovať',
        'copy_to_campaign'  => 'Kopírovať do kampane',
        'explore_view'      => 'Vložené zobrazenie',
        'export'            => 'Exportovať',
        'find_out_more'     => 'Dozvedieť sa viac',
        'go_to'             => 'Prejsť na :name',
        'more'              => 'Ďalšie akcie',
        'move'              => 'Premiestniť',
        'new'               => 'Nový',
        'next'              => 'Ďalej',
        'private'           => 'Súkromný',
        'public'            => 'Verejný',
    ],
    'add'               => 'Pridať',
    'attributes'        => [
        'actions'       => [
            'add'               => 'Pridať atribúť',
            'add_block'         => 'Pridať blok',
            'add_checkbox'      => 'Pridať zaškrtávacie políčko',
            'add_text'          => 'Pridať text',
            'apply_template'    => 'Použiť šablónu atribútov',
            'manage'            => 'Spravovať',
            'remove_all'        => 'Odstrániť všetko',
        ],
        'create'        => [
            'description'   => 'Vytvoriť nový atribút',
            'success'       => 'Atribút :name pridaný k :entity.',
            'title'         => 'Nový atribút pre :name',
        ],
        'destroy'       => [
            'success'   => 'Atribút :name odstránený z :entity.',
        ],
        'edit'          => [
            'description'   => 'Upraviť existujúci atribút',
            'success'       => 'Atribút :name upravený pre :entity.',
            'title'         => 'Upraviť atribút pre :name',
        ],
        'fields'        => [
            'attribute'             => 'Atribút',
            'community_templates'   => 'Komunitné šablóny',
            'is_private'            => 'Súkromné atribúty',
            'is_star'               => 'Pripnutý',
            'template'              => 'Šablóna',
            'value'                 => 'Hodnota',
        ],
        'helpers'       => [
            'delete_all'    => 'Naozaj chceš odstrániť všetky atribúty tohto objektu?',
        ],
        'hints'         => [
            'is_private'    => 'Všetky atribúty objektu je možné skryť pred všetkými členmi okrem tých s rolou Admin, ak ho nastavíš ako súkromný.',
        ],
        'index'         => [
            'success'   => 'Atribúty pre :entity upravené.',
            'title'     => 'Atribúty pre :name',
        ],
        'placeholders'  => [
            'attribute' => 'Počet dobytí, úroveň obtiažnosti výzvy, iniciatíva, obyvateľstvo',
            'block'     => 'Názov bloku',
            'checkbox'  => 'Názov zaškrtávacieho políčka',
            'section'   => 'Názov sekcie',
            'template'  => 'Vybrať šablónu',
            'value'     => 'Hodnota atribútu',
        ],
        'template'      => [
            'success'   => 'Šablóna atribútov :name použitá na :entity',
            'title'     => 'Použiť šablónu atribútov na :name',
        ],
        'types'         => [
            'attribute' => 'Atribút',
            'block'     => 'Blok',
            'checkbox'  => 'Zaškrtávacie políčko',
            'section'   => 'Sekcia',
            'text'      => 'Viacriadkový text',
        ],
        'visibility'    => [
            'entry'     => 'Atribút je zobrazený v menu objektu.',
            'private'   => 'Atribút viditeľný len pre členov s rolou Admin.',
            'public'    => 'Atribút viditeľný pre všetkých členov.',
            'tab'       => 'Atribút je zobrazený len v karte atribútov.',
        ],
    ],
    'bulk'              => [
        'edit'          => [
            'tags'  => [
                'add'       => 'Pridať',
                'remove'    => 'Odstrániť',
            ],
        ],
        'errors'        => [
            'admin' => 'Iba administrátori kampane vedia zmeniť súkromný štatút objektu.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Prepísať',
            ],
            'helpers'   => [
                'override'  => 'Ak aktivované, oprávnenia vybratých objektov budú týmito prepísané. Ak deaktivované, vybrané oprávnenia budú pridané k predchádzajúcim.',
            ],
            'title'     => 'Zmeniť oprávnenia pre viaceré objekty',
        ],
        'success'       => [
            'permissions'   => 'Oprávnenia zmenené pre :count objekt.|Oprávnenia zmenené pre :count objektov.',
            'private'       => ':count objekt je teraz súkromný.|:count objektov je teraz súkromných.',
            'public'        => ':count objekt je teraz viditeľný.|:count objektov je teraz viditeľných.',
        ],
    ],
    'cancel'            => 'Zrušiť',
    'click_modal'       => [
        'close'     => 'Zavrieť',
        'confirm'   => 'Potvrdiť',
        'title'     => 'Potvrdiť akciu',
    ],
    'copy_to_campaign'  => [
        'panel' => 'Kopírovať',
        'title' => 'Kopírovať :name do inej kampane',
    ],
    'create'            => 'Vytvoriť',
    'datagrid'          => [
        'empty' => 'Zatiaľ je tu prázdno.',
    ],
    'delete_modal'      => [
        'close'         => 'Zatvoriť',
        'delete'        => 'Odstrániť',
        'description'   => 'Naozaj chceš odstrániť :tag?',
        'mirrored'      => 'Odstrániť zrkadlený vzťah.',
        'title'         => 'Potvrdiť odstránenie',
    ],
    'destroy_many'      => [
        'success'   => ':count objekt zmazaný|:count objekty zmazané',
    ],
    'edit'              => 'Upraviť',
    'errors'            => [
        'node_must_not_be_a_descendant' => 'Neplatný objekt (kategória, miesto): bol by potomok samého seba.',
    ],
    'events'            => [
        'hint'  => 'Kalendárne udalosti, ktoré sú prepojené s týmto objektom, sa zobrazujú na tomto mieste.',
    ],
    'export'            => 'Exportovať',
    'fields'            => [
        'attribute_template'    => 'Šablóna atribútov',
        'calendar'              => 'Kalendár',
        'calendar_date'         => 'Dátum',
        'character'             => 'Postava',
        'colour'                => 'Farba',
        'copy_attributes'       => 'Kopírovať atribúty',
        'copy_notes'            => 'Kopírovať poznámky objektu',
        'creator'               => 'Autor',
        'dice_roll'             => 'Hod kockou',
        'entity'                => 'Objekt',
        'entity_type'           => 'Typ objektu',
        'entry'                 => 'Záznam',
        'event'                 => 'Udalosť',
        'excerpt'               => 'Výpis',
        'family'                => 'Rod',
        'files'                 => 'Súbory',
        'header_image'          => 'Obrázok záhlavia',
        'image'                 => 'Obrázok',
        'is_private'            => 'Súkromný',
        'is_star'               => 'Pripnutý',
        'item'                  => 'Predmet',
        'location'              => 'Miesto',
        'name'                  => 'Názov',
        'organisation'          => 'Organizácia',
        'race'                  => 'Rasa',
        'tag'                   => 'Deň',
        'tags'                  => 'Štítky',
        'visibility'            => 'Viditeľnosť',
    ],
    'files'             => [
        'actions'   => [
            'drop'      => 'Kliknutím pridať alebo súbor pretiahnuť na toto miesto (Drag & Drop).',
            'manage'    => 'Spravovať súbory objektov',
        ],
        'errors'    => [
            'max'   => 'Max. počet (:max) súborov v tomto objekte dosiahnutý.',
        ],
        'files'     => 'Nahraté súbory',
        'hints'     => [
            'limit'         => 'Do každého objektu môže byť nahratých maximálne :max súborov.',
            'limitations'   => 'Podporované formáty: jpg, png, gif a pdf. Max. veľkosť súboru: :size.',
        ],
        'title'     => 'Súbory objektu :name',
    ],
    'filter'            => 'Filter',
    'filters'           => [
        'all'       => 'Filter zobrazenia všetkých podobjektov',
        'clear'     => 'Resetovať filter',
        'direct'    => 'Filter zobrazenia iba priamych podobjektov',
        'filtered'  => 'Zobraziť :count z :total :entity.',
        'hide'      => 'Skryť',
        'show'      => 'Zobraziť',
        'title'     => 'Filter',
    ],
    'forms'             => [
        'actions'       => [
            'calendar'  => 'Doplniť dátum',
        ],
        'copy_options'  => 'Kopírovať nastavenia',
    ],
    'hidden'            => 'Skrytý',
    'hints'             => [
        'attribute_template'    => 'Aplikovať šablónu atribútov automaticky pri vytvorení objektu.',
        'calendar_date'         => 'Dátum umožňuje filtrovať zoznamy a zadať udalosť do vybraného kalendára.',
        'image_limitations'     => 'Podporované formáty: jpg, png a gif. Max. veľkosť súboru: :size.',
        'image_patreon'         => 'Zvýš svoj limit tým, že nás podporíš na Patreone.',
        'is_private'            => 'Nastaviť ako súkromný.',
        'is_star'               => 'Pripnuté objekty sa zobrazia v menu objektu.',
        'map_limitations'       => 'Podporované formáty: jpg, png, gif a svg. Max. veľkosť súboru: :size.',
        'visibility'            => 'Ak je viditeľnosť nastavená na "Admin", vidia to len členovia a členky roly Admin. Ak je nastavená na "Vlastník", môže to vidieť len ty.',
    ],
    'history'           => [
        'created'   => 'Vytvorené: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'unknown'   => 'Neznámy',
        'updated'   => 'Posledná úprava: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'view'      => 'Zobraziť protokol objektu',
    ],
    'image'             => [
        'error' => 'Požadovaný obrázok nebolo možné stiahnuť. Zdá sa, že daná webová stránka nepovoľuje sťahovanie obrázkov (typické správanie Squarescape a DeviantArt) alebo že link už nie je platný.',
    ],
    'is_private'        => 'Tento objekt je súkromný a neviditeľný pre divákov.',
    'linking_help'      => 'Ako môžem prepojiť ďalšie objekty?',
    'manage'            => 'Spravovať',
    'move'              => [
        'description'   => 'Premiestniť objekt na iné miesto',
        'errors'        => [
            'permission'        => 'Nemáš oprávnenie vytvoriť objekty tohto typu v tejto kampani.',
            'same_campaign'     => 'Musíš vybrať inú kampaň, do ktorej chceš daný objekt premiestniť.',
            'unknown_campaign'  => 'Neznáma kampaň',
        ],
        'fields'        => [
            'campaign'  => 'Nová kampaň',
            'copy'      => 'Vytvoriť kópiu',
            'target'    => 'Nový typ',
        ],
        'hints'         => [
            'campaign'  => 'Môžeš tiež skúsiť premiestniť tento objekt do inej kampane.',
            'copy'      => 'Vyber si túto možnosť, ak chceš vytvoriť kópiu v novej kampani.',
            'target'    => 'Prosím, uvedom si, že niektoré dáta môžu zmiznúť, ak sa objekt premiestni do iného typu.',
        ],
        'success'       => 'Objekt :name premiestnený',
        'success_copy'  => 'Objekt :name skopírovaný',
        'title'         => 'Premiestniť :name na iné miesto',
    ],
    'new_entity'        => [
        'error' => 'Prosím, prekontroluj tvoje zadanie.',
        'fields'=> [
            'name'  => 'Názov',
        ],
        'title' => 'Nový objekt',
    ],
    'or_cancel'         => 'alebo <a href=":url">Zrušiť</a>',
    'panels'            => [
        'appearance'            => 'Výzor',
        'attribute_template'    => 'Šablóna atribútov',
        'calendar_date'         => 'Dátum',
        'entry'                 => 'Záznam',
        'general_information'   => 'Všeobecné informácie',
        'move'                  => 'Premiestniť',
        'system'                => 'Systém',
    ],
    'permissions'       => [
        'action'    => 'Akcie',
        'actions'   => [
            'bulk'          => [
                'add'       => 'Pridať',
                'ignore'    => 'Ignorovať',
                'remove'    => 'Odstrániť',
            ],
            'delete'        => 'Zmazať',
            'edit'          => 'Upraviť',
            'entity_note'   => 'Poznámky objektu',
            'read'          => 'Čítať',
            'toggle'        => 'Prepnúť',
        ],
        'allowed'   => 'Povolené',
        'fields'    => [
            'member'    => 'Člen',
            'role'      => 'Rola',
        ],
        'helper'    => 'Použi toto rozhranie na nastavenie oprávnení pre užívateľov a role pre daný objekt.',
        'success'   => 'Oprávnenia uložené.',
        'title'     => 'Oprávnenia',
    ],
    'placeholders'      => [
        'calendar'      => 'Vybrať kalendár',
        'character'     => 'Vybrať postavu',
        'entity'        => 'Objekt',
        'event'         => 'Vybrať udalosť',
        'family'        => 'Vybrať rod',
        'image_url'     => 'Obrázok je možné pridať aj nahratím cez URL.',
        'item'          => 'Vybrať predmet',
        'location'      => 'Vybrať miesto',
        'organisation'  => 'Vybrať organizáciu',
        'race'          => 'Vybrať rasu',
        'tag'           => 'Vybrať deň',
    ],
    'relations'         => [
        'actions'   => [
            'add'   => 'Pridať vzťah',
        ],
        'fields'    => [
            'location'  => 'Miesto',
            'name'      => 'Názov',
            'relation'  => 'Vzťah',
        ],
        'hint'      => 'Vzťahy je možné vytvoriť medzi objektami a zobraziť tak ich prepojenie.',
    ],
    'remove'            => 'Zmazať',
    'rename'            => 'Premenovať',
    'save'              => 'Uložiť',
    'save_and_close'    => 'Uložiť a zavrieť',
    'save_and_new'      => 'Uložiť a nový',
    'save_and_update'   => 'Uložiť a upraviť',
    'save_and_view'     => 'Uložiť a zobraziť',
    'search'            => 'Hľadať',
    'select'            => 'Vybrať',
    'tabs'              => [
        'attributes'    => 'Atribúty',
        'calendars'     => 'Kalendáre',
        'default'       => 'Štandardný',
        'events'        => 'Udalosti',
        'inventory'     => 'Inventár',
        'map-points'    => 'Značky na mape',
        'mentions'      => 'Referencie',
        'menu'          => 'Menu',
        'notes'         => 'Poznámky',
        'permissions'   => 'Oprávnenia',
        'relations'     => 'Vzťahy',
        'reminders'     => 'Pripomenutia',
    ],
    'update'            => 'Upraviť',
    'users'             => [
        'unknown'   => 'Neznámy',
    ],
    'view'              => 'Zobraziť',
    'visibilities'      => [
        'admin' => 'Admin',
        'all'   => 'Všetci',
        'self'  => 'Vlastník',
    ],
];
