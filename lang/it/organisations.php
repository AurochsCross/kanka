<?php

return [
    'create'        => [
        'title' => 'Nuova Organizzazione',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'members'       => 'Membri',
        'organisation'  => 'Organizzazione Padre',
        'organisations' => 'Sotto-Organizzazioni',
    ],
    'helpers'       => [
        'descendants'   => 'Questa lista contiene tutte le organizzazione che sono discendenti di questa organizzazione, non solo quelle direttamente sotto di essa.',
    ],
    'index'         => [],
    'members'       => [
        'actions'       => [
            'add'   => 'Aggiungi un membro',
        ],
        'create'        => [
            'success'   => 'Membro aggiunto all\'organizzazione',
            'title'     => 'Nuovo Membro dell\'Organizzazione :name',
        ],
        'destroy'       => [
            'success'   => 'Membro rimosso dall\'organizzazione',
        ],
        'edit'          => [
            'success'   => 'Mebro dell\'organizzazione aggiornato.',
            'title'     => 'Aggiorna Membro per :name',
        ],
        'fields'        => [
            'character'     => 'Personaggio',
            'organisation'  => 'Organizzazione',
            'role'          => 'Ruolo',
        ],
        'helpers'       => [
            'members'   => 'La lista seguente rappresenta tutti i personaggi che fanno parte di questa organizzazione e di tutte le organizzazioni che ne discendono.',
        ],
        'placeholders'  => [
            'character' => 'Seleziona un personaggio',
            'role'      => 'Leader, Membro, Alto Septon, Maestro di Spinaggio',
        ],
        'title'         => 'Membri dell\'Organizzazione :name',
    ],
    'organisations' => [
        'title' => 'Organizzazioni dell\'Organizzazione :name',
    ],
    'placeholders'  => [
        'location'  => 'Seleziona un luogo',
        'name'      => 'Nome dell\'organizzazione',
        'type'      => 'Culto, Banda, Ribellione, Fandom',
    ],
    'show'          => [
        'tabs'  => [
            'organisations' => 'Organizzazioni',
        ],
    ],
];
