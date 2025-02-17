<?php

return [
    'actions'       => [
        'add'   => 'Añadir nueva era',
    ],
    'create'        => [
        'success'   => 'Era :name creada.',
        'title'     => 'Nueva era',
    ],
    'delete'        => [
        'success'   => 'Era :name eliminada.',
    ],
    'edit'          => [
        'success'   => 'Era :name actualizada.',
        'title'     => 'Editar era :name',
    ],
    'fields'        => [
        'abbreviation'  => 'Abreviatura',
        'end_year'      => 'Año final',
        'is_collapsed'  => 'Colapsada',
        'start_year'    => 'Año inicial',
    ],
    'helpers'       => [
        'eras'          => 'Hay que crear la línea de tiempo para poder añadirle eras.',
        'is_collapsed'  => 'La era estará colapsada (minimizada) por defecto.',
        'primary'       => 'Separa tu línea de tiempo en eras. Una línea de tiempo necesita al menos una era para funcionar correctamente.',
    ],
    'placeholders'  => [
        'abbreviation'  => 'a.C., d.C., BCE...',
        'end_year'      => 'Año en que termina la era. Déjalo en blanco si esta es la era actual.',
        'name'          => 'Era moderna, Edad del bronce, Guerras galácticas...',
        'start_year'    => 'Año en que la era comienza. Déjalo en blanco si esta es la primera era.',
    ],
    'reorder'       => [],
];
