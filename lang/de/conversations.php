<?php

return [
    'create'        => [
        'title' => 'Neue Unterhaltung',
    ],
    'destroy'       => [],
    'edit'          => [
        'title' => 'Unterhaltung :name',
    ],
    'fields'        => [
        'is_closed'     => 'geschlossen',
        'messages'      => 'Nachrichten',
        'name'          => 'Name',
        'participants'  => 'Teilnehmer',
        'target'        => 'Ziel',
        'type'          => 'Typ',
    ],
    'hints'         => [
        'participants'  => 'Bitte füge Teilnehmer zu deiner Unterhaltung hinzu, indem du das :icon Symbol oben rechts drückst.',
    ],
    'index'         => [
        'title' => 'Unterhaltungen',
    ],
    'messages'      => [
        'destroy'       => [
            'success'   => 'Nachricht gelöscht.',
        ],
        'is_updated'    => 'Aktualisiert',
        'load_previous' => 'Lade vorherige Nachrichten',
        'placeholders'  => [
            'message'   => 'Deine Nachricht',
        ],
    ],
    'participants'  => [
        'create'    => [
            'success'   => 'Teilnehmer :entity zu Unterhaltung hinzugefügt.',
        ],
        'destroy'   => [
            'success'   => 'Teilnehmer :entity von Unterhaltung entfernt.',
        ],
        'modal'     => 'Teilnehmer',
        'title'     => 'Teilnehmer von :name',
    ],
    'placeholders'  => [
        'name'  => 'Name der Unterhaltung',
        'type'  => 'Im Spiel, Vorbereitung, Handlung',
    ],
    'show'          => [
        'is_closed' => 'Unterhaltung geschlossen',
    ],
    'tabs'          => [
        'conversation'  => 'Unterhaltung',
        'participants'  => 'Teilnehmer',
    ],
    'targets'       => [
        'characters'    => 'Charaktere',
        'members'       => 'Mitglieder',
    ],
];
