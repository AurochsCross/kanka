<?php

return [
    'actions'   => [
        'status'    => 'Status: :status',
    ],
    'public'    => [
        'campaign'      => [
            'private'   => 'La campagne est actuellement privée.',
            'public'    => 'La campagne est actuellement publique.',
        ],
        'description'   => 'Définis les autorisations pour le rôle public afin de visualiser les entités suivantes de la campagne. Un utilisateur est automatiquement dans le rôle public s\'il accède la campagne sans en être un membre.',
        'test'          => 'Pour tester les permissions du rôle public, ouvres l\'url de la campagne :url dans une fenêtre incognito.',
    ],
    'show'      => [
        'title' => 'Permissions :role - :campaign',
    ],
    'toggle'    => [
        'disabled'  => 'Les membre du rôle :role ne peuvent plus :action les :entities.',
        'enabled'   => 'Les membre du rôle :role peuvent maintenant :action les :entities.',
    ],
];
