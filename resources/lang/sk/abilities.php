<?php

return [
    'abilities'     => [
        'title' => 'Schopnosti priradené :name',
    ],
    'children'      => [
        'actions'       => [
            'add'   => 'Priradiť schopnosť k objektu',
        ],
        'create'        => [
            'success'   => 'Schopnosť :name priradená k objektu.',
            'title'     => 'Priradiť objekt k :name',
        ],
        'description'   => 'Objekty s touto schopnosťou',
        'title'         => 'Objekty schopnosti :name',
    ],
    'create'        => [
        'title' => 'Nová schopnosť',
    ],
    'destroy'       => [],
    'edit'          => [],
    'entities'      => [
        'title' => 'Objekty so schopnosťou :name',
    ],
    'fields'        => [
        'abilities' => 'Schopnosti',
        'ability'   => 'Schopnosť',
        'charges'   => 'Náboje',
        'name'      => 'Názov',
        'type'      => 'Typ',
    ],
    'helpers'       => [
        'descendants'   => 'Tento zoznam obsahuje všetky schopnosti, ktoré sú pod touto schopnosťou a nielen tie, ktoré sú priradené len priamo nej.',
        'nested_parent' => 'Zobraziť schopnosti :parent',
        'nested_without'=> 'Zobrazujú sa všetky schopnosti, ktoré nemajú nadradenú schopnosť. Kliknutím na riadok zobrazíš podradené schopnosti.',
    ],
    'index'         => [
        'title' => 'Schopnosti',
    ],
    'placeholders'  => [
        'charges'   => 'Počet nábojov. Prepoj atribúty cez {Úroveň}*{CHA}',
        'name'      => 'Ohnivá guľa, Stále v strehu, Zákerný výpad',
        'type'      => 'Kúzlo, schopnosť, útočný manéver',
    ],
    'show'          => [
        'tabs'  => [
            'abilities' => 'Schopnosti',
            'entities'  => 'Objekty',
        ],
    ],
];
