<?php

return [
    'actions'       => [
        'add'   => 'Ajouter une nouvelle couche',
    ],
    'base'          => 'Couche de base',
    'bulks'         => [
        'delete'    => '{1} Retiré :count couche.|[2,*] Retiré :count couches.',
        'patch'     => '{1} Modifié :count couche.|[2,*] Modifié :count couches.',
    ],
    'create'        => [
        'success'   => 'Couche :name créée.',
        'title'     => 'Nouvelle Couche',
    ],
    'delete'        => [
        'success'   => 'Couche :name supprimée.',
    ],
    'edit'          => [
        'success'   => 'Couche :name modifiée.',
        'title'     => 'Modifier la couche :name',
    ],
    'fields'        => [
        'position'  => 'Position',
        'type'      => 'Type de couche',
    ],
    'helper'        => [
        'amount_v2' => 'Définis des couches sur une carte pour changer l\'image d\'arrière-plan affichée sous les marqueurs.',
        'is_real'   => 'Les couches ne sont pas disponibles quand la carte utilise OpenStreetMaps.',
    ],
    'index'         => [
        'title' => 'Couches de :name',
    ],
    'pitch'         => [
        'error' => 'Nombre maximal de couche atteins.',
        'until' => 'Créer jusqu\'à :max couches pour chaque carte.',
    ],
    'placeholders'  => [
        'name'          => 'Sous-sol, Niveau 2, Epave',
        'position'      => 'Champ optionnel pour définir l\'ordre d\'affichage des couches.',
        'position_list' => 'Après :name',
    ],
    'reorder'       => [
        'save'      => 'Enregistrer le nouvel ordre',
        'success'   => '{1} Réordonné :count couche.|[2,*] Réordonné :count couches.',
        'title'     => 'Réordonné les couches',
    ],
    'short_types'   => [
        'overlay'       => 'Overlay',
        'overlay_shown' => 'Overlay (affiché par défaut)',
        'standard'      => 'Standard',
    ],
    'types'         => [
        'overlay'       => 'Overlay (affiché par défaut la couche active)',
        'overlay_shown' => 'Overlay affiché par défaut',
        'standard'      => 'Couche standard (basculer entre les couches)',
    ],
];
