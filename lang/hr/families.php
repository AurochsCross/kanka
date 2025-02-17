<?php

return [
    'create'        => [
        'title' => 'Nova obitelj',
    ],
    'destroy'       => [],
    'edit'          => [],
    'families'      => [
        'title' => 'Obitelji od obitelji :name',
    ],
    'fields'        => [
        'families'  => 'Obitelji unutar veće obitelji',
        'family'    => 'Obitelj s manjim obiteljima',
        'members'   => 'Članovi',
    ],
    'helpers'       => [
        'descendants'       => 'Ovaj popis sadrži sve obitelji koje su potomci ove obitelji, a ne samo one koje su neposredno pod trenutnom obitelji.',
        'nested_without'    => 'Prikaz svih obitelji koji nemaju obiteljn roditelj. Klikni redak da bi vidio/la obitelji djecu.',
    ],
    'hints'         => [
        'members'   => 'Ovdje su navedeni članovi obitelji. Lik se može dodati u obitelj uređivanjem željenog lika, upotrebom padajućeg izbornika "Obitelj".',
    ],
    'index'         => [],
    'members'       => [
        'helpers'   => [
            'all_members'       => 'Na sljedećem popisu su svi likovi koji se nalaze u ovoj obitelji i sve manjim obiteljima unutar ove obitelji.',
            'direct_members'    => 'Većina obitelji ima članove koji ju vode ili čine poznatom. Sljedeći popis prikazuje likove koji se nalaze u ovoj obitelji.',
        ],
        'title'     => 'Članovi obitelji :name',
    ],
    'placeholders'  => [
        'location'  => 'Odaberi lokaciju',
        'name'      => 'Ime obitelji',
        'type'      => 'Kraljevska, plemenita, izumrla',
    ],
    'show'          => [
        'tabs'  => [
            'all_members'   => 'Svi članovi',
            'families'      => 'Obitelji',
            'members'       => 'Članovi',
        ],
    ],
];
