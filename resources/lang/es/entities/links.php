<?php

return [
    'actions'       => [
        'add'   => 'Añadir un enlace',
    ],
    'create'        => [
        'success'   => 'Enlace :name añadido a :entity.',
        'title'     => 'Añadir un enlace a :name',
    ],
    'destroy'       => [
        'success'   => 'Enlace :name eliminado de :entity.',
    ],
    'fields'        => [
        'icon'      => 'Icono',
        'name'      => 'Nombre',
        'position'  => 'Posición',
        'url'       => 'URL',
    ],
    'helpers'       => [
        'goto'      => 'Ir a :name',
        'icon'      => 'Se puede personalizar el icono mostrado en el enlace con cualquiera de los iconos gratuitos de :fontawesome. Si se deja en blanco, se usará el icono por defecto.',
        'leaving'   => 'Estás a punto de salir de Kanka e ir a otro dominio. La página a la que te diriges ha sido proporcionada por un usuario y no ha sido revisada por nuestra web.',
        'url'       => 'La dirección a la que te diriges es :url.',
    ],
    'placeholders'  => [
        'name'  => 'DNDBeyond',
        'url'   => 'https://dndbeyond.com/character-url',
    ],
    'show'          => [
        'helper'    => 'Las campañas mejoradas pueden añadir enlaces en las entidades que dirigen a webs externas.',
        'title'     => 'Enlaces de :name',
    ],
    'unboosted'     => [],
    'update'        => [
        'success'   => 'Enlace :name actualizado.',
        'title'     => 'Actualizar enlace de :name',
    ],
];
