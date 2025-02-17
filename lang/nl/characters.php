<?php

return [
    'actions'       => [
        'add_appearance'    => 'Voeg een uiterlijk toe',
        'add_organisation'  => 'Voeg een organisatie toe',
        'add_personality'   => 'Voeg een persoonlijkheid toe',
    ],
    'conversations' => [
        'title' => 'Personage :name Conversaties',
    ],
    'create'        => [
        'title' => 'Nieuw Personage',
    ],
    'destroy'       => [],
    'dice_rolls'    => [
        'hint'  => 'Dobbelsteen worpen kunnen worden toegewezen aan een personage voor in het spel.',
        'title' => 'Personage :name Dobbelsteen Worpen',
    ],
    'edit'          => [],
    'fields'        => [
        'age'                       => 'Leeftijd',
        'is_dead'                   => 'Dood',
        'is_personality_visible'    => 'Persoonlijkheid zichtbaar',
        'life'                      => 'Leven',
        'physical'                  => 'Fysiek',
        'sex'                       => 'Geslacht',
        'title'                     => 'Titel',
        'traits'                    => 'Eigenschappen',
    ],
    'helpers'       => [
        'age'   => 'Je kunt deze entiteit koppelen aan een kalender van je campaign om in plaats daarvan automatisch hun leeftijd te berekenen. :more.',
    ],
    'hints'         => [
        'is_dead'                   => 'Dit personage is dood',
        'is_personality_visible'    => 'Schakel deze optie uit om het hele persoonlijkheidsgedeelte te verbergen voor niet-beheerders.',
        'personality_not_visible'   => 'Persoonlijkheidskenmerken van dit personage zijn momenteel alleen zichtbaar voor Beheerders',
        'personality_visible'       => 'Persoonlijkheidskenmerken van dit personage zijn voor iedereen zichtbaar.',
    ],
    'index'         => [],
    'items'         => [
        'hint'  => 'Voorwerpen kunnen worden toegewezen aan personages en worden hier weergegeven.',
        'title' => 'Personage :name Voorwerpen',
    ],
    'journals'      => [
        'title' => 'Personage :name Logboeken',
    ],
    'maps'          => [
        'title' => 'Personage :name Relatie Kaart',
    ],
    'organisations' => [
        'actions'       => [
            'add'   => 'Voeg organisatie toe',
        ],
        'create'        => [
            'success'   => 'Personage toegevoegd aan organisatie.',
            'title'     => 'Nieuwe Organisatie voor :name',
        ],
        'destroy'       => [
            'success'   => 'Personage organisatie verwijderd.',
        ],
        'edit'          => [
            'success'   => 'Personage organisatie bijgewerkt.',
            'title'     => 'Werk organisatie voor :name bij',
        ],
        'fields'        => [
            'organisation'  => 'Organisatie',
            'role'          => 'Rol',
        ],
        'hint'          => 'Personages kunnen deel uitmaken van veel organisaties, die vertegenwoordigen voor wie ze werken of van welk geheime samenleving ze deel uitmaken.',
        'placeholders'  => [
            'organisation'  => 'Kies een organisatie...',
        ],
        'title'         => 'Personage :name Organisaties',
    ],
    'placeholders'  => [
        'age'               => 'Leeftijd',
        'appearance_entry'  => 'Beschrijving',
        'appearance_name'   => 'Haar, Ogen, Huid, Lengte',
        'personality_entry' => 'Details',
        'personality_name'  => 'Doelen, Manieren, Angsten, Verplichtingen',
        'physical'          => 'Fysiek',
        'sex'               => 'Geslacht',
        'title'             => 'Titel',
        'traits'            => 'Eigenschappen',
        'type'              => 'NPC, Speler Personage, Godheid',
    ],
    'quests'        => [
        'helpers'   => [
            'quest_giver'   => 'Quests waarvan het personage een quest gever is.',
            'quest_member'  => 'Quests waarvan het personage lid is.',
        ],
    ],
    'sections'      => [
        'appearance'    => 'Uiterlijk',
        'general'       => 'Algemene informatie',
        'personality'   => 'Persoonlijkheid',
    ],
    'show'          => [
        'tabs'  => [
            'organisations' => 'Organisaties',
        ],
    ],
    'warnings'      => [
        'personality_hidden'    => 'Het is niet toegestaan om persoonlijkheidskenmerken van dit personage te bewerken.',
    ],
];
