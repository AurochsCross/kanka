<?php

return [
    'actions'       => [
        'add'   => 'Pridať novú vrstvu',
    ],
    'base'          => 'Základná vrstva',
    'bulks'         => [
        'delete'    => '{1} Odstránená :count vrstva.|[2,4] Odstránené :count vrstvy.|[5,*] Odstránených :count vrstiev.',
        'patch'     => '{1} Aktualizovaná :count vrstva.|[2,4] Aktualizované :count vrstvy.|[5,*] Aktualizovaných :count vrstiev.',
    ],
    'create'        => [
        'success'   => 'Vrstva :name vytvorená.',
        'title'     => 'Nová vrstva',
    ],
    'delete'        => [
        'success'   => 'Vrstva :name odstránená.',
    ],
    'edit'          => [
        'success'   => 'Vrstva :name aktualizovaná.',
        'title'     => 'Upraviť vrstvu :name',
    ],
    'fields'        => [
        'position'  => 'Pozícia',
        'type'      => 'Typ vrstvy',
    ],
    'helper'        => [
        'amount_v2' => 'Nahraj vrstvy k mape, ak chceš zmeniť obrázok v pozadí značiek.',
        'is_real'   => 'Vrstvy nie sú dostupné, ak používaš OpenStreetMaps.',
    ],
    'index'         => [
        'title' => 'Vrstvy :name',
    ],
    'pitch'         => [
        'error' => 'Dosiahnutý max. počet vrstiev.',
        'until' => 'Nahraj ku každej mape až :max vrstiev.',
    ],
    'placeholders'  => [
        'name'          => 'Podsvetie, Úroveň 2, Vrak lode',
        'position'      => 'Nepovinné pole na nastavenie poradia zobrazenia vrstiev.',
        'position_list' => 'Po :name',
    ],
    'reorder'       => [
        'save'      => 'Uložiť nové poradie',
        'success'   => '{1} Preusporiadaná :count vrstva.|[2,4] Preusporiadané :count vrstvy.|[5,*] Preusporiadaných :count vrstiev.',
        'title'     => 'Usporiadať vrstvy',
    ],
    'short_types'   => [
        'overlay'       => 'Overlay',
        'overlay_shown' => 'Overlay (automatické zobrazenie)',
        'standard'      => 'Štandardné',
    ],
    'types'         => [
        'overlay'       => 'Overlay (zobrazenie nad aktívnou vrstvou)',
        'overlay_shown' => 'Overlay bude zobrazený štandardne',
        'standard'      => 'Štandardná vrstva (prepnúť medzi vrstvami)',
    ],
];
