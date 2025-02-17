<?php

return [
    'create'        => [
        'title' => 'Criar um novo evento',
    ],
    'destroy'       => [],
    'edit'          => [],
    'events'        => [
        'helper'    => 'Eventos que tem essa entidade como seu evento-pai são mostrados aqui.',
        'title'     => 'Evento :name Eventos',
    ],
    'fields'        => [
        'date'      => 'Data',
        'event'     => 'Evento Pai',
        'events'    => 'Eventos',
    ],
    'helpers'       => [
        'date'              => 'Este campo pode conter qualquer coisa e não está vinculado aos calendários da campanha. Para vincular este evento a uma agenda, adicione-o na agenda ou na guia de lembretes deste evento.',
        'nested_without'    => 'Mostrando todos os eventos que não tem um evento-pai. Clique em uma linha para ver os eventos-filhos.',
    ],
    'index'         => [],
    'placeholders'  => [
        'date'  => 'A data para o seu evento',
        'name'  => 'Nome do evento',
        'type'  => 'Cerimonia, Festa, Desastre, Batalha, Nascimento',
    ],
    'show'          => [
        'tabs'  => [
            'events'    => 'Eventos',
        ],
    ],
    'tabs'          => [
        'calendars' => 'Registros no Calendário',
    ],
];
