<?php

return [
    'create'            => [
        'title' => 'Neuer Menü Link',
    ],
    'destroy'           => [],
    'edit'              => [
        'title' => 'Menü Link :name',
    ],
    'fields'            => [
        'dashboard'         => 'Dashboard',
        'default_dashboard' => 'Standard-Dashboard',
        'entity'            => 'Objekt',
        'filters'           => 'Filter',
        'is_nested'         => 'verschachtelt',
        'menu'              => 'Menü',
        'position'          => 'Position',
        'random'            => 'zufällig',
        'random_type'       => 'zufälliger Objekttyp',
        'selector'          => 'Quick Link-Konfiguration',
        'type'              => 'Objekttyp',
    ],
    'helpers'           => [
        'dashboard'         => 'Lassen Sie den Quick Link auf eines der benutzerdefinierten Dashboards der Kampagne abzielen. Diese Funktion ist nur verfügbar für :boosted.',
        'default_dashboard' => 'Verknüpfen Sie stattdessen mit dem Standard-Dashboard der Kampagne. Es muss noch ein benutzerdefiniertes Dashboard ausgewählt werden.',
        'entity'            => 'Richten Sie diesen Menülink ein, um direkt zu einem Objekt zu gelangen. Das Feld :tab steuert, welche der Registerkarten fokussiert ist. Das :menu Feld steuert, welche Unterseite des Objekts geöffnet wird.',
        'position'          => 'Dieses Feld kann genutzt werden um die Linkreihenfolge im Menü festzulegen.',
        'random'            => 'Verwenden Sie dieses Feld, um einen Schnelllink zu einem zufälligen Objekt zu erhalten. Sie können den Link filtern, um nur zu einem bestimmten Objekttyp zu gelangen.',
        'selector'          => 'Konfigurieren Sie, wohin dieser Quicklink führt, wenn ein Benutzer in der Seitenleiste darauf klickt.',
        'type'              => 'Richten Sie diesen Menülink ein, um direkt zu einer Liste von Objekten zu gelangen. Kopieren Sie zum Filtern der Ergebnisse Teile der URL in die Liste der gefilterten Objekte nach :? Melden Sie sich im Feld :filter an',
    ],
    'index'             => [],
    'placeholders'      => [
        'entity'    => 'Wähle ein Objekt',
        'filters'   => 'location_id=15&type=city',
        'menu'      => 'Menü Unterseite (Nutze den letzten Text der URL)',
        'name'      => 'Name des Menü Links',
        'tab'       => 'Geschichte, Beziehungen, Notizen',
    ],
    'random_no_entity'  => 'Keine zufälligen Objekte gefunden.',
    'random_types'      => [
        'any'   => 'jedes Objekt',
    ],
    'reorder'           => [
        'success'   => 'Menü Links neu geordnet.',
        'title'     => 'Menü Links neu anordnen',
    ],
    'show'              => [],
];
