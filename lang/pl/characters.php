<?php

return [
    'actions'       => [
        'add_appearance'    => 'Dodaj cechę wyglądu',
        'add_organisation'  => 'Dodaj organizację',
        'add_personality'   => 'Dodaj cechę osobowości',
    ],
    'conversations' => [
        'title' => 'Konwersacje postaci :name',
    ],
    'create'        => [
        'title' => 'Nowa postać',
    ],
    'destroy'       => [],
    'dice_rolls'    => [
        'hint'  => 'Postaci można przypisać rodzaj rzutów kośćmi, wykonywanych w grze.',
        'title' => 'Rzuty kośćmi postaci :name',
    ],
    'edit'          => [],
    'fields'        => [
        'age'                       => 'Wiek',
        'families'                  => 'Rodziny',
        'is_appearance_pinned'      => 'Przypnij wygląd',
        'is_dead'                   => 'Nie żyje',
        'is_personality_pinned'     => 'Przypnij osobowość',
        'is_personality_visible'    => 'Osobowość jawna',
        'life'                      => 'Życie',
        'physical'                  => 'Powierzchowność',
        'pronouns'                  => 'Rodzaj gramatyczny',
        'sex'                       => 'Płeć',
        'title'                     => 'Tytuł',
        'traits'                    => 'Opis',
    ],
    'helpers'       => [
        'age'   => 'Możesz też połączyć ten element z kalendarzem kampanii, by automatycznie obliczyć wiek. :more',
    ],
    'hints'         => [
        'is_appearance_pinned'      => 'Zaznacz, by cechy wyglądu postaci wyświetlane były w widoku podstawowym.',
        'is_dead'                   => 'Ta postać jest martwa',
        'is_personality_pinned'     => 'Zaznacz, by cechy osobowości postaci wyświetlane były w widoku podstawowym.',
        'is_personality_visible'    => 'Odznacz by ukryć cały opis osobowości przed użytkownikami niebędących administratorami.',
        'personality_not_visible'   => 'Opis osobowości widoczny wyłącznie dla administratorów.',
        'personality_visible'       => 'Opis osobowości widoczny dla wszystkich.',
    ],
    'index'         => [],
    'items'         => [
        'hint'  => 'Postaci można przypisać przedmioty - będą wyświetlane tutaj.',
        'title' => 'Przedmioty postaci :name',
    ],
    'journals'      => [
        'title' => 'Dzienniki postaci :name',
    ],
    'maps'          => [
        'title' => 'Mapa relacji postaci :name',
    ],
    'organisations' => [
        'actions'       => [
            'add'   => 'Dodaj organizację',
        ],
        'create'        => [
            'success'   => 'Postać dodana do organizacji',
            'title'     => 'Nowa organizacja dla :name',
        ],
        'destroy'       => [
            'success'   => 'Postać usunięta z organizacji',
        ],
        'edit'          => [
            'success'   => 'Zaktualizowano organizacje postaci.',
            'title'     => 'Aktualizuj organizacje dla :name',
        ],
        'fields'        => [
            'organisation'  => 'Organizacja',
            'role'          => 'Rola',
        ],
        'hint'          => 'Postaci mogą należeć do wielu organizacji. Oznaczaj w tej sposób, dla kogo pracują albo do jakich tajnych sprzysiężeń należą.',
        'placeholders'  => [
            'organisation'  => 'Wybierz organizację...',
        ],
        'title'         => 'Organizacje postaci :name',
    ],
    'placeholders'  => [
        'age'               => 'Wiek',
        'appearance_entry'  => 'Opis',
        'appearance_name'   => 'Włosy, oczy, kolor skóry, wzrost',
        'name'              => 'Imię postaci',
        'personality_entry' => 'Szczegóły',
        'personality_name'  => 'Pragnienia, manieryzmy, obawy, więzi',
        'physical'          => 'Fizyczne',
        'pronouns'          => 'On/Jego, Ona/Jej, Ono/Jego',
        'sex'               => 'Płeć',
        'title'             => 'Tytuł',
        'traits'            => 'Opis',
        'type'              => 'Bohater Niezależny, Postać Gracza, bóstwo',
    ],
    'quests'        => [
        'helpers'   => [
            'quest_giver'   => 'Zadania, które postać zleciła.',
            'quest_member'  => 'Zadania, w których postać się pojawia.',
        ],
    ],
    'sections'      => [
        'appearance'    => 'Wygląd',
        'general'       => 'Informacje podstawowe',
        'personality'   => 'Osobowość',
    ],
    'show'          => [
        'tabs'  => [
            'organisations' => 'Organizacje',
        ],
    ],
    'warnings'      => [
        'personality_hidden'    => 'Nie masz uprawnień do edycji osobowości tej postaci.',
    ],
];
