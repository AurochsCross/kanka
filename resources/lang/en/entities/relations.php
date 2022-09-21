<?php

return [
    'actions'           => [
        'mode-map'      => 'Relation exploration tool',
        'mode-table'    => 'Table of relations and connections',
    ],
    'bulk'              => [
        'delete'            => '{1} Deleted :count relation.|[2,*] Deleted :count relations.',
        'delete_mirrored'   => 'Also delete mirrored relations.',
        'success'           => [
            'editing'           => '{1} :count relation was updated.|[2,*] :count relations were updated.',
            'editing_partial'   => '{1} :count/:total relation was updated.|[2,*] :count/:total relations were updated.',
        ],
        'update_mirrored'   => 'Also update mirrored relations.',
        'unmirror'          => 'Unmirror mirrored relations.',
    ],
    'call-to-action'    => 'Visually explore the relations of this entity and how it\'s connected to the rest of the campaign.',
    'connections'       => [
        'map_point'         => 'Map point',
        'mention'           => 'Mention',
        'quest_element'     => 'Quest element',
        'timeline_element'  => 'Timeline element',
    ],
    'create'            => [
        'new_title' => 'New relation',
        'success'   => 'Relation :target added to :entity.',
        'title'     => 'New relation for :name',
    ],
    'delete_mirrored'   => [
        'helper'    => 'This relation is mirrored on the target entity. Select this option to also remove the mirrored relation.',
        'option'    => 'Delete mirrored relation',
    ],
    'destroy'           => [
        'mirrored'  => 'This will also delete the mirrored relation and is permanent.',
        'success'   => 'Relation :target removed for :entity.',
    ],
    'fields'            => [
        'attitude'          => 'Attitude',
        'connection'        => 'Connection',
        'is_star'           => 'Pinned',
        'owner'             => 'Source',
        'relation'          => 'Relation',
        'target'            => 'Target',
        'target_relation'   => 'Target Relation',
        'two_way'           => 'Create mirror relation',
    ],
    'helper'            => 'Set up relations between entities with attitudes and visibility. Relations can also be pinned to the entity\'s menu.',
    'helpers'           => [
        'no_relations'  => 'This entity doesn\'t currently have any relations to other entities of the campaign.',
        'popup'         => 'Entities of the campaign can be linked together using relations. These can have a description, an attitude rating, a visibility to control who sees a relation, and more.',
    ],
    'hints'             => [
        'attitude'          => 'This optional field can be used to define the default order relations appear in by descending order.',
        'mirrored'          => [
            'text'  => 'This relation is mirrored with :link.',
            'title' => 'Mirrored',
        ],
        'target_relation'   => 'The relation description on the target. Leave blank to use this relation\'s text.',
        'two_way'           => 'If you select to create a mirror relation, the same relation will be created on the target. However, if you edit one, the mirror won\'t be updated.',
    ],
    'index'             => [
        'title' => 'Relations',
    ],
    'options'           => [
        'mentions'          => 'Default + related + mentions',
        'only_relations'    => 'Only direct relations',
        'related'           => 'Default + related',
        'relations'         => 'Default',
        'show'              => 'Show',
    ],
    'panels'            => [
        'related'   => 'Related',
    ],
    'placeholders'      => [
        'attitude'  => '-100 to 100, 100 being very positive',
        'relation'  => 'Rival, Best Friend, Sibling',
        'target'    => 'Choose an entity',
    ],
    'show'              => [
        'title' => ':name Connections',
    ],
    'types'             => [
        'family_member'         => 'Family member',
        'organisation_member'   => 'Organisation Member',
    ],
    'update'            => [
        'success'   => 'Relation :target updated for :entity.',
        'title'     => 'Update relations for :name',
    ],
];
