<?php

return [
    'characters'    => [
        'helpers'   => [
            'all_characters'    => 'Zobrazí všetky postavy tejto rasy a jej podradených rás.',
            'characters'        => 'Zobrazí všetky postavy iba tejto rasy.',
        ],
        'title'     => 'Postavy rasy :name',
    ],
    'create'        => [
        'title' => 'Nová rasa',
    ],
    'destroy'       => [],
    'edit'          => [],
    'fields'        => [
        'characters'    => 'Postavy',
        'locations'     => 'Miesta',
        'race'          => 'Nadradená rasa',
        'races'         => 'Podrasy',
    ],
    'helpers'       => [
        'nested_without'    => 'Zobrazujú sa všetky rasy, ktoré nemajú nadradenú rasu. Kliknutím na riadok zobrazíš podradené rasy.',
    ],
    'index'         => [],
    'placeholders'  => [
        'name'  => 'Názov rasy',
        'type'  => 'Človek, Fey, Borg',
    ],
    'races'         => [
        'title' => 'Podrasy rasy :name',
    ],
    'show'          => [
        'tabs'  => [
            'characters'    => 'Postavy',
            'races'         => 'Podrasy',
        ],
    ],
];
