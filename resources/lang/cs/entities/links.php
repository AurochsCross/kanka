<?php

return [
    'actions'       => [
        'add'   => 'Přidat odkaz',
    ],
    'create'        => [
        'success'   => 'Odkaz :name přidán objektu :entity',
        'title'     => 'Přidat odkaz k objektu :name',
    ],
    'destroy'       => [
        'success'   => 'Odkaz :name odstraněn',
    ],
    'fields'        => [
        'icon'      => 'Ikona',
        'name'      => 'Název',
        'position'  => 'Umístění',
        'url'       => 'URL',
    ],
    'helpers'       => [
        'goto'      => 'Přejít na :name',
        'icon'      => 'Můžeš změnit ikonu zobrazenou u odkazu. Můžeš použít jakoukoli z volně dostupných ikon od :fontawesome nebo nechat toto pole prázdné a použije se výchozí ikona.',
        'leaving'   => 'Opouštíš systém Kanka. Stránku, na kterou míříš, zadal jiný uživatel a my nemůžeme garantovat její bezpečnost.',
        'url'       => 'Stránka na kterou míříš ukazuje na toto URL: :url',
    ],
    'placeholders'  => [
        'name'  => 'DNDBeyond',
        'url'   => 'https://dndbeyond.com/character-url',
    ],
    'show'          => [
        'helper'    => 'Zvýhodněná (boosted) tažení mohou objektům přidávat odkazy, vedoucí na externí stránky.',
        'title'     => 'Odkazy objektu :name',
    ],
    'unboosted'     => [],
    'update'        => [
        'success'   => 'Odkaz :name objektu :entity aktualizován',
        'title'     => 'Aktualizovat odkaz objektu :name',
    ],
];
