<?php

return [
    'actions'                   => [
        'actions'           => 'Akcie',
        'apply'             => 'Použiť',
        'back'              => 'Naspäť',
        'bulk_templates'    => 'Použiť šablónu atribútov',
        'copy'              => 'Kopírovať',
        'copy_mention'      => 'Kopírovať [ ] referenciu',
        'copy_to_campaign'  => 'Kopírovať do kampane',
        'explore_view'      => 'Vnorené zobrazenie',
        'export'            => 'Exportovať (PDF)',
        'find_out_more'     => 'Dozvedieť sa viac',
        'go_to'             => 'Prejsť na :name',
        'json-export'       => 'Exportovať (json)',
        'manage_links'      => 'Spravovať linky',
        'more'              => 'Ďalšie akcie',
        'move'              => 'Premiestniť',
        'new'               => 'Nový',
        'new_post'          => 'Nová poznámka objektu',
        'next'              => 'Ďalej',
        'print'             => 'Tlačiť',
        'private'           => 'Súkromný',
        'public'            => 'Verejný',
        'reset'             => 'Resetovať',
        'transform'         => 'Transformovať',
    ],
    'add'                       => 'Pridať',
    'alerts'                    => [
        'copy_attribute'    => 'Referencia na atribút bola skopírovaná do tvojej schránky.',
        'copy_mention'      => 'Rozšírená referencia na objekt bola skopírovaná do tvojej schránky.',
    ],
    'boosted'                   => 'Boostnutá',
    'boosted_campaigns'         => 'Boostnuté kampane',
    'bulk'                      => [
        'actions'       => [
            'edit'  => 'Hromadná úprava a kategórie',
        ],
        'age'           => [
            'helper'    => 'Môžeš použiť + a - pred číslom na úpravu veku o danú hodnotu.',
        ],
        'delete'        => [
            'title'     => 'Odstraňujú sa viaceré objekty',
            'warning'   => 'Naozaj chceš odstrániť vybrané objekty?',
        ],
        'edit'          => [
            'tagging'   => 'Akcie s kategóriami',
            'tags'      => [
                'add'       => 'Pridať',
                'remove'    => 'Odstrániť',
            ],
            'title'     => 'Úprava viacerých objektov',
        ],
        'errors'        => [
            'admin'     => 'Iba administrátori kampane vedia zmeniť súkromný štatút objektu.',
            'general'   => 'Pri spracovávaní tvojej akcie došlo k chybe. Prosím, skús to opäť a kontaktuj nás, ak problém pretrváva. Hlásenie chyby: :hint.',
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
            'copy_to_campaign'  => '{1} :count objekt bol skopírovaný do :campaign.|[2,4] :count objekty boli skopírované do :campaign.|[5,*] :count objektov bolo skopírovaných do :campaign.',
            'editing'           => '{1} :count objekt bol upravený.|[2,4] :count objekty boli upravené.|[5,*] :count objektov bolo upravených.',
            'editing_partial'   => '{1} :count/:total objekt bol upravený.|[2,4] :count/:total objekty boli upravené.|[5,*] :count/:total objektov bolo upravených.',
            'permissions'       => '{1} Oprávnenia zmenené pre :count objekt.|[2,4] Oprávnenia zmenené pre :count objekty.|[5,*] Oprávnenia zmenené pre :count objektov.',
            'private'           => '{1} :count objekt je teraz súkromný.|[2,4] :count objekty je teraz súkromné.|[5,*] :count objektov je teraz súkromných.',
            'public'            => '{1} :count objekt je teraz viditeľný.|[2,4] :count objekty sú teraz viditeľné.|[5,*] :count objektov je teraz viditeľných.',
            'templates'         => '{1} :count objekt má uplatnenú šablónu.|[2,4] :count objekty majú uplatnenú šablónu.|[5,*] :count objektov má uplatnenú šablónu.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Uplatniť šablónu na viaceré objekty',
    ],
    'cancel'                    => 'Zrušiť',
    'click_modal'               => [
        'close'     => 'Zavrieť',
        'confirm'   => 'Potvrdiť',
        'title'     => 'Potvrdiť akciu',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Kopírovať objekty do inej kampane',
        'panel'         => 'Kopírovať',
        'title'         => 'Kopírovať :name do inej kampane',
    ],
    'create'                    => 'Vytvoriť',
    'datagrid'                  => [
        'empty' => 'Zatiaľ je tu prázdno.',
    ],
    'delete_modal'              => [
        'close'             => 'Zatvoriť',
        'delete'            => 'Odstrániť',
        'description'       => 'Naozaj chceš odstrániť :tag?',
        'description_final' => 'Naozaj chceš odstrániť :tag? Táto akcia nemôže byť vrátená späť.',
        'mirrored'          => 'Odstrániť zrkadlený vzťah.',
        'title'             => 'Potvrdiť odstránenie',
    ],
    'destroy_many'              => [
        'success'   => ':count objekt zmazaný|:count objekty zmazané',
    ],
    'edit'                      => 'Upraviť',
    'errors'                    => [
        'boosted'                       => 'Táto funkcionalita je dostupná iba pre boostnuté kampane.',
        'boosted_campaigns'             => 'Funkcionalita je dostupná iba pre :boosted.',
        'node_must_not_be_a_descendant' => 'Neplatný objekt (kategória, miesto): bol by potomok samého seba.',
        'unavailable_feature'           => 'Funkcionalita nedostupná',
    ],
    'events'                    => [
        'hint'  => 'Kalendárne udalosti, ktoré sú prepojené s týmto objektom, sa zobrazujú na tomto mieste.',
    ],
    'export'                    => 'Exportovať',
    'fields'                    => [
        'ability'               => 'Schopnosť',
        'attribute_template'    => 'Šablóna atribútov',
        'calendar'              => 'Kalendár',
        'calendar_date'         => 'Dátum',
        'character'             => 'Postava',
        'child'                 => 'Dieťa',
        'closed'                => 'Uzavretá',
        'colour'                => 'Farba',
        'copy_abilities'        => 'Kopírovať schopnosti',
        'copy_attributes'       => 'Kopírovať atribúty',
        'copy_inventory'        => 'Kopírovať inventár',
        'copy_links'            => 'Kopírovať linky objektu',
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
        'gallery_header'        => 'Záhlavie galérie',
        'gallery_image'         => 'Obrázok galérie',
        'has_entity_files'      => 'So súbormi v objektoch',
        'has_entity_notes'      => 'S poznámkami v objektoch',
        'has_image'             => 'S obrázkom',
        'header_image'          => 'Obrázok záhlavia',
        'image'                 => 'Obrázok',
        'is_closed'             => 'Diskusia bude uzavretá a nebude možné do nej pridávaťnové správy.',
        'is_private'            => 'Súkromný',
        'is_private_v2'         => 'Zobraziť len pre členov role :admin-role v kampani. Toto nastavenie prepíše iné oprávnenia.',
        'is_private_v3'         => 'Zobraziť iba pre členov :admin-role role. Toto má prednosť pre ostatnými oprávneniami.',
        'is_star'               => 'Pripnutý',
        'item'                  => 'Predmet',
        'journal'               => 'Denník',
        'location'              => 'Miesto',
        'locations'             => ':first v :second',
        'map'                   => 'Mapa',
        'name'                  => 'Názov',
        'organisation'          => 'Organizácia',
        'position'              => 'Pozícia',
        'privacy'               => 'Súkromie',
        'race'                  => 'Rasa',
        'tag'                   => 'Kategória',
        'tags'                  => 'Kategórie',
        'timeline'              => 'Časová os',
        'tooltip'               => 'Bublina',
        'type'                  => 'Typ',
        'visibility'            => 'Viditeľnosť',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Kliknutím pridať alebo súbor pretiahnuť na toto miesto (Drag & Drop).',
            'manage'    => 'Spravovať súbory objektov',
        ],
        'errors'    => [
            'max'       => 'Max. počet (:max) súborov v tomto objekte dosiahnutý.',
            'no_files'  => 'Žiadne súbory.',
        ],
        'files'     => 'Nahraté súbory',
        'hints'     => [
            'limit'         => 'Do každého objektu môže byť nahratých maximálne :max súborov.',
            'limitations'   => 'Podporované formáty: jpg, png, gif a pdf. Max. veľkosť súboru: :size.',
        ],
        'title'     => 'Súbory objektu :name',
    ],
    'filter'                    => 'Filter',
    'filters'                   => [
        'all'                       => 'Filter zobrazenia všetkých podobjektov',
        'clear'                     => 'Resetovať filter',
        'copy_helper'               => 'Použi skopírované filtre v schránke pre hodnoty filtrov vo widgetoch na nástenke a rýchlych linkoch.',
        'copy_helper_no_filters'    => 'Definuj najprv nejaké filtre, aby bolo možné ich skopírovať do schránky.',
        'copy_to_clipboard'         => 'Kopírovať filtre do schránky',
        'direct'                    => 'Filter zobrazenia iba priamych podobjektov',
        'filtered'                  => 'Zobraziť :count z :total :entity.',
        'hide'                      => 'Skryť',
        'lists'                     => [
            'desktop'   => [
                'all'       => 'Zobraziť všetky podradené (:count)',
                'filtered'  => 'Zobraziť priamo podradené (:count)',
            ],
            'mobile'    => [
                'all'       => 'Zobraziť všetky (:count)',
                'filtered'  => 'Zobraziť priame (:count)',
            ],
        ],
        'mobile'                    => [
            'clear' => 'Vymazať',
            'copy'  => 'Schránka',
        ],
        'options'                   => [
            'exclude'   => 'Vylúčiť',
            'include'   => 'Zahrnúť',
            'none'      => 'Žiadne',
        ],
        'show'                      => 'Zobraziť filtre',
        'sorting'                   => [
            'asc'       => ':field vzostupne',
            'desc'      => ':field zostupne',
            'helper'    => 'Nastav poradie zoradenia výsledkov.',
        ],
        'title'                     => 'Filter',
    ],
    'fix-this-issue'            => 'Odstrániť tento problém',
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Doplniť dátum',
        ],
        'copy_options'  => 'Kopírovať nastavenia',
    ],
    'helpers'                   => [
        'copy_options'  => 'Kopírovať nasledujúce prepojené prvky zo zdroja do nového objektu.',
    ],
    'hidden'                    => 'Skrytý',
    'hints'                     => [
        'attribute_template'    => 'Aplikovať šablónu atribútov automaticky pri vytvorení objektu.',
        'calendar_date'         => 'Dátum umožňuje filtrovať zoznamy a zadať udalosť do vybraného kalendára.',
        'gallery_header'        => 'Ak objekt nemá záhlavie, zobraziť namiesto toho obrázok z galérie kampane.',
        'gallery_image'         => 'Ak objekt nemá obrázok, zobraziť namiesto toho obrázok z galérie kampane.',
        'header_image'          => 'Tento obrázok je umiestnený nad objekt. Odporúčame používať obrázok na šírku.',
        'image_limitations'     => 'Podporované formáty: :formats. Max. veľkosť súboru: :size.',
        'image_patreon'         => 'Chceš zvýšiť limit pre veľkosť súborov?',
        'image_recommendation'  => 'Odporúčané rozmery: :width x :height px.',
        'is_private'            => 'Nastaviť ako súkromný.',
        'is_star'               => 'Pripnuté objekty sa zobrazia v menu objektu.',
        'tooltip'               => 'Nahradiť automaticky generovaný obsah bubliny týmto obsahom.',
        'visibility'            => 'Ak je viditeľnosť nastavená na "Admin", vidia to len členovia a členky roly Admin. Ak je nastavená na "Vlastník", môže to vidieť len ty.',
    ],
    'history'                   => [
        'created'               => 'Vytvorené: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'created_clean'         => 'Vytvorené :name :date',
        'created_date'          => 'Vytvorené: <span data-toggle="tooltip" title=":realdate">:date</span>',
        'created_date_clean'    => 'Vytvorené :date',
        'unknown'               => 'Neznámy',
        'updated'               => 'Posledná úprava: <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'updated_clean'         => 'Posledná úprava :name :date',
        'updated_date'          => 'Posledná úprava: <span data-toggle="tooltip" title=":realdate">:date</span>',
        'updated_date_clean'    => 'Posledná úprava :date',
        'view'                  => 'Zobraziť protokol objektu',
    ],
    'image'                     => [
        'error' => 'Požadovaný obrázok nebolo možné stiahnuť. Zdá sa, že daná webová stránka nepovoľuje sťahovanie obrázkov (typické správanie Squarescape a DeviantArt) alebo že link už nie je platný.',
    ],
    'is_not_private'            => 'Tento objekt nie je aktuálne nastavený ako súkromný.',
    'is_private'                => 'Tento objekt je súkromný a viditeľný len pre členov s rolou Admin.',
    'legacy'                    => 'Dedičstvo',
    'linking_help'              => 'Ako môžem prepojiť ďalšie objekty?',
    'manage'                    => 'Spravovať',
    'move'                      => [
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
        'panels'        => [
            'change'    => 'Zmeniť typ objektu',
            'move'      => 'Premiestniť do inej kampane',
        ],
        'success'       => 'Objekt :name premiestnený',
        'success_copy'  => 'Objekt :name skopírovaný',
        'title'         => 'Premiestniť :name na iné miesto',
    ],
    'navigation'                => [
        'cancel'    => 'Zrušiť',
        'or_cancel' => 'alebo :cancel',
    ],
    'new_entity'                => [
        'error' => 'Prosím, prekontroluj tvoje zadanie.',
        'fields'=> [
            'name'  => 'Názov',
        ],
        'title' => 'Nový objekt',
    ],
    'or_cancel'                 => 'alebo <a href=":url">Zrušiť</a>',
    'panels'                    => [
        'appearance'            => 'Výzor',
        'attribute_template'    => 'Šablóna atribútov',
        'calendar_date'         => 'Dátum',
        'entry'                 => 'Záznam',
        'general_information'   => 'Všeobecné informácie',
        'move'                  => 'Premiestniť',
        'system'                => 'Systém',
    ],
    'permissions'               => [
        'action'            => 'Akcie',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Povoliť',
                'deny'      => 'Zakázať',
                'ignore'    => 'Ignorovať',
                'remove'    => 'Odstrániť',
            ],
            'bulk_entity'   => [
                'allow'     => 'Povoliť',
                'deny'      => 'Zakázať',
                'inherit'   => 'Zdediť',
            ],
            'delete'        => 'Zmazať',
            'edit'          => 'Upraviť',
            'entity_note'   => 'Poznámky objektu',
            'read'          => 'Čítať',
            'toggle'        => 'Prepnúť',
        ],
        'allowed'           => 'Povolené',
        'fields'            => [
            'member'    => 'Člen',
            'role'      => 'Rola',
        ],
        'helper'            => 'Použi toto rozhranie na nastavenie oprávnení pre užívateľov a role pre daný objekt.',
        'helpers'           => [
            'entity_note'   => 'Povoliť užívateľom vytvárať poznámky k tomuto objektu. Aj bez tohto oprávnenia budú ešte stále vidieť poznámky s nastavením viditeľnosti pre všetkých.',
            'setup'         => 'Pomocou tohto rozhrania môžeš presne nastaviť ako role a užívatelia pracujú s týmto objektom. :allow dovolí užívateľovi alebo role urobiť danú akciu. :deny im túto akciu zakáže. :inherit preberie nastavenie z roly užívateľa alebo z oprávnení hlavnej roly. Užívateľ s nastavením :allow môže danú akciu vykonať, aj keď má jeho rola nastavenie :deny.',
        ],
        'inherited'         => 'Táto rola má už pridelené oprávnenia na tento typ objektov.',
        'inherited_by'      => 'Tomuto užívateľovi je pridelená rola :role, ktorá mu poskytuje oprávnenia na tento typ objektov.',
        'success'           => 'Oprávnenia uložené.',
        'title'             => 'Oprávnenia',
        'too_many_members'  => 'Táto kampaň má príliš veľa členov (> 10), aby boli zobrazení v tomto rozhraní. Prosím, použi tlačidlo Oprávnení na danom objekte, aby sa zobrazili detaily nastavenia oprávnení.',
    ],
    'placeholders'              => [
        'ability'       => 'Vybrať schopnosť',
        'calendar'      => 'Vybrať kalendár',
        'character'     => 'Vybrať postavu',
        'entity'        => 'Objekt',
        'event'         => 'Vybrať udalosť',
        'family'        => 'Vybrať rod',
        'gallery_image' => 'Vyber obrázok z galérie kampane',
        'image_url'     => 'Obrázok je možné pridať aj nahratím cez URL.',
        'item'          => 'Vyber predmet',
        'journal'       => 'Vyber denník',
        'location'      => 'Vyber miesto',
        'map'           => 'Vyber mapu',
        'note'          => 'Vyber poznámku',
        'organisation'  => 'Vyber organizáciu',
        'quest'         => 'Vyber úlohu',
        'race'          => 'Vyber rasu',
        'tag'           => 'Vyber kategóriu',
        'timeline'      => 'Vyber časovú os',
    ],
    'relations'                 => [
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
    'remove'                    => 'Zmazať',
    'rename'                    => 'Premenovať',
    'save'                      => 'Uložiť',
    'save_and_close'            => 'Uložiť a zavrieť',
    'save_and_copy'             => 'Uložiť a kopírovať',
    'save_and_new'              => 'Uložiť a nový',
    'save_and_update'           => 'Uložiť a upraviť',
    'save_and_view'             => 'Uložiť a zobraziť',
    'search'                    => 'Hľadať',
    'select'                    => 'Vybrať',
    'superboosted_campaigns'    => 'Superboostnuté kampane',
    'tabs'                      => [
        'abilities'     => 'Schopnosti',
        'assets'        => 'Materiály',
        'attributes'    => 'Atribúty',
        'boost'         => 'Boost',
        'calendars'     => 'Kalendáre',
        'connections'   => 'Vzťahy',
        'default'       => 'Štandardný',
        'events'        => 'Udalosti',
        'inventory'     => 'Inventár',
        'links'         => 'Linky',
        'map-points'    => 'Značky na mape',
        'mentions'      => 'Referencie',
        'menu'          => 'Menu',
        'notes'         => 'Poznámky',
        'permissions'   => 'Oprávnenia',
        'profile'       => 'Profil',
        'quests'        => 'Úlohy',
        'relations'     => 'Vzťahy',
        'reminders'     => 'Pripomienky',
        'story'         => 'Príbeh',
        'timelines'     => 'Časové osi',
        'tooltip'       => 'Bublina',
    ],
    'tooltips'                  => [
        'boosted_feature'   => 'Funkcionalita boostnutej kampane',
    ],
    'update'                    => 'Upraviť',
    'users'                     => [
        'unknown'   => 'Neznámy',
    ],
    'view'                      => 'Zobraziť',
    'visibilities'              => [
        'admin'         => 'Admin',
        'admin-self'    => 'Vlastník a Admin',
        'all'           => 'Všetci',
        'members'       => 'Členovia',
        'self'          => 'Vlastník',
    ],
];
