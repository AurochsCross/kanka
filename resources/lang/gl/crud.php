<?php

return [
    'actions'                   => [
        'actions'           => 'Accións',
        'apply'             => 'Aplicar',
        'back'              => 'Voltar',
        'bulk_templates'    => 'Aplicar Padrón de atributos',
        'copy'              => 'Copiar',
        'copy_mention'      => 'Copiar mención [ ]',
        'copy_to_campaign'  => 'Copiar a campaña',
        'explore_view'      => 'Vista en árbore',
        'export'            => 'Exportar (PDF)',
        'find_out_more'     => 'Saber máis',
        'go_to'             => 'Ir a :name',
        'json-export'       => 'Exportar (JSON)',
        'manage_links'      => 'Administrar ligazóns',
        'more'              => 'Máis',
        'move'              => 'Mover',
        'new'               => 'Crear nova',
        'next'              => 'Seguinte',
        'reset'             => 'Restablecer',
    ],
    'add'                       => 'Engadir',
    'alerts'                    => [
        'copy_attribute'    => 'A mención do atributo foi copiada ao portapapeis.',
        'copy_mention'      => 'A mención avanzada da entidade foi copiada ao portapapeis.',
    ],
    'attributes'                => [
        'actions'       => [
            'add'               => 'Engadir atributo',
            'add_block'         => 'Engadir bloque',
            'add_checkbox'      => 'Engadir caixa de selección',
            'add_text'          => 'Engadir texto',
            'apply_template'    => 'Aplicar un padrón de atributos',
            'manage'            => 'Administrar',
            'more'              => 'Máis opcións',
            'remove_all'        => 'Eliminar todos',
        ],
        'create'        => [
            'description'   => 'Crear novo atributo',
            'success'       => 'Atributo ":name" engadido a :entity.',
            'title'         => 'Novo atributo para :name',
        ],
        'destroy'       => [
            'success'   => 'Atributo ":name" de :entity eliminado.',
        ],
        'edit'          => [
            'description'   => 'Actualizar un atributo existente',
            'success'       => 'Atributo ":name" de :entity actualizado.',
            'title'         => 'Actualizar atributo de :name',
        ],
        'errors'        => [
            'loop'  => 'Hai un bucle infinito neste cálculo de atributo!',
        ],
        'fields'        => [
            'attribute'             => 'Atributo',
            'community_templates'   => 'Padróns da comunidade',
            'is_private'            => 'Atributos privados',
            'is_star'               => 'Fixado',
            'template'              => 'Padrón',
            'value'                 => 'Valor',
        ],
        'helpers'       => [
            'delete_all'    => 'Seguro que queres eliminar todos os atributos desta entidade?',
        ],
        'hints'         => [
            'is_private'    => 'Podes ocultar todos os atributos a todos os usuarios non administradores facendo que a entidade sexa privada.',
        ],
        'index'         => [
            'success'   => 'Atributos de :entity actualizados.',
            'title'     => 'Atributos de :name',
        ],
        'placeholders'  => [
            'attribute' => 'Nivel, iniciativa, populación...',
            'block'     => 'Nome do bloque',
            'checkbox'  => 'Nome da caixa de selección',
            'icon'      => [
                'name'  => 'Nome da icona',
            ],
            'random'    => [
                'name'  => 'Nome do atributo',
                'value' => '1-100 ou lista de valores separados por comas',
            ],
            'section'   => 'Nome da sección',
            'template'  => 'Selecciona un padrón',
            'value'     => 'Valor do atributo',
        ],
        'template'      => [
            'success'   => 'Padrón de atributos ":name" aplicado a :entity',
            'title'     => 'Aplicar un padrón de atributos a :name',
        ],
        'types'         => [
            'attribute' => 'Atributo',
            'block'     => 'Bloque',
            'checkbox'  => 'Caixa de selección',
            'icon'      => 'Icona',
            'random'    => 'Aleatorio',
            'section'   => 'Sección',
            'text'      => 'Texto multiliña',
        ],
        'visibility'    => [
            'entry'     => 'O atributo é mostrado no menú da entidade.',
            'private'   => 'Atributo só visíbel para administradoras.',
            'public'    => 'Atributo visíbel a todas as membras.',
            'tab'       => 'O atributo é mostrado na lapela "Atributos".',
        ],
    ],
    'boosted'                   => 'Potenciada',
    'boosted_campaigns'         => 'Campañas potenciadas',
    'bulk'                      => [
        'actions'       => [
            'edit'  => 'Editar e etiquetar en masa',
        ],
        'age'           => [
            'helper'    => 'Usa + e - antes do número para modificar a idade nesa cantidade.',
        ],
        'delete'        => [
            'title'     => 'Eliminar múltiples entidades',
            'warning'   => 'Seguro que queres eliminar as entidades seleccionadas?',
        ],
        'edit'          => [
            'tagging'   => 'Acción para as etiquetas',
            'tags'      => [
                'add'       => 'Engadir',
                'remove'    => 'Eliminar',
            ],
            'title'     => 'Editando múltiples entidades',
        ],
        'errors'        => [
            'admin'     => 'Só as administradoras da campaña poden cambiar o estado de privacidade das entidades.',
            'general'   => 'Houbo un erro ao procesar a acción. Inténtao de novo e contáctanos se o problema persiste. Mesaxe do erro: :hint.',
        ],
        'permissions'   => [
            'fields'    => [
                'override'  => 'Substituir',
            ],
            'helpers'   => [
                'override'  => 'Se está seleccionado, os permisos das entidades seleccionadas serán substituidos por estes. Se non está seleccionado, os permisos seleccionados serán engadidos aos existentes.',
            ],
            'title'     => 'Cambiar os permisos a varias entidades',
        ],
        'success'       => [
            'copy_to_campaign'  => '{1} :count entidade copiada a ":campaign".|[2,*] :count entidades copiadas a ":campaign".',
            'editing'           => '{1} :count entidade actualizada.|[2,*] :count entidades actualizadas.',
            'permissions'       => '{1} Permisos alterados para :count entidade.|[2,*] Permisos alterados para :count entidades.',
            'private'           => '{1} :count entidade é agora privada|[2,*] :count entidades son agora privadas.',
            'public'            => '{1} :count entidade é agora visíbel|[2,*] :count entidades son agora visíbeis.',
            'templates'         => '{1} Aplicouse un padrón a :count entidade.|[2,*] Aplicouse un padrón a :count entidades.',
        ],
    ],
    'bulk_templates'            => [
        'bulk_title'    => 'Aplica un padrón a múltiples entidades',
    ],
    'cancel'                    => 'Cancelar',
    'click_modal'               => [
        'close'     => 'Pechar',
        'confirm'   => 'Confirmar',
        'title'     => 'Confirma a túa acción',
    ],
    'copy_to_campaign'          => [
        'bulk_title'    => 'Copiar entidades a outra campaña',
        'panel'         => 'Copiar',
        'title'         => 'Copiar ":name" a outra campaña',
    ],
    'create'                    => 'Crear',
    'datagrid'                  => [
        'empty' => 'Nada que mostrar (aínda).',
    ],
    'delete_modal'              => [
        'close'         => 'Pechar',
        'delete'        => 'Eliminar',
        'description'   => 'Seguro que queres eliminar :tag?',
        'mirrored'      => 'Eliminar relación espellada.',
        'title'         => 'Confirmación de eliminación',
    ],
    'destroy_many'              => [
        'success'   => 'Eliminouse :count entidade|Elimináronse :count entidades.',
    ],
    'edit'                      => 'Editar',
    'errors'                    => [
        'boosted'                       => 'Esta función só está dispoñíbel para campañas potenciadas.',
        'boosted_campaigns'             => 'Esta función só está dispoñíbel para :boosted.',
        'node_must_not_be_a_descendant' => 'Nó inválido (etiqueta, localización nai): sería un descendente de si mesmo.',
        'unavailable_feature'           => 'Función non dispoñíbel',
    ],
    'events'                    => [
        'hint'  => 'Abaixo tes unha lista de todos os calendarios nos que esta entidade foi engadida usando a interface "Engadir un evento a un calendario".',
    ],
    'export'                    => 'Exportar',
    'fields'                    => [
        'ability'               => 'Habilidade',
        'attribute_template'    => 'Padrón de atributos',
        'calendar'              => 'Calendario',
        'calendar_date'         => 'Data do calendario',
        'character'             => 'Personaxe',
        'colour'                => 'Cor',
        'copy_abilities'        => 'Copiar habilidades',
        'copy_attributes'       => 'Copiar atributos',
        'copy_inventory'        => 'Copiar inventario',
        'copy_links'            => 'Copiar ligazóns de entidade',
        'copy_notes'            => 'Copiar notas de entidade',
        'creator'               => 'Creadora',
        'dice_roll'             => 'Tirada de dados',
        'entity'                => 'Entidade',
        'entity_type'           => 'Tipo de entidade',
        'entry'                 => 'Entrada',
        'event'                 => 'Evento',
        'excerpt'               => 'Limiar',
        'family'                => 'Familia',
        'files'                 => 'Arquivos',
        'gallery_image'         => 'Imaxe de galería',
        'has_entity_files'      => 'Ten arquivos de entidade',
        'has_entity_notes'      => 'Ten notas de entidade',
        'has_image'             => 'Contén unha imaxe',
        'header_image'          => 'Imaxe de cabeceira',
        'image'                 => 'Imaxe',
        'is_private'            => 'Privada',
        'is_private_v2'         => 'Mostra isto só a integrantes do :admin-role da campaña. Isto sobrescrebe calquer outro permiso.',
        'is_star'               => 'Fixada',
        'item'                  => 'Obxeto',
        'location'              => 'Localización',
        'map'                   => 'Mapa',
        'name'                  => 'Nome',
        'organisation'          => 'Organización',
        'position'              => 'Posición',
        'privacy'               => 'Privacidade',
        'race'                  => 'Raza',
        'tag'                   => 'Etiqueta',
        'tags'                  => 'Etiquetas',
        'timeline'              => 'Liña temporal',
        'tooltip'               => 'Previsualización emerxente',
        'type'                  => 'Tipo',
        'visibility'            => 'Visibilidade',
    ],
    'files'                     => [
        'actions'   => [
            'drop'      => 'Fai click para engadir un arquivo, ou arrástrao ata aquí.',
            'manage'    => 'Administrar arquivos de entidade',
        ],
        'errors'    => [
            'max'       => 'Chegaches ao número máximo (:max) de arquivos para esta entidade.',
            'no_files'  => 'Non hai arquivos.',
        ],
        'files'     => 'Arquivos subidos.',
        'hints'     => [
            'limit'         => 'Cada entidade pode ter ata :max arquivos subidos.',
            'limitations'   => 'Formatos soportados: :formats. Tamaño máximo do arquivo: :size',
        ],
        'title'     => 'Arquivos da entidade ":name"',
    ],
    'filter'                    => 'Filtrar',
    'filters'                   => [
        'all'       => 'Filtrar para todas as entidades descendentes',
        'clear'     => 'Quitar filtros',
        'direct'    => 'Filtrar só descendentes directas',
        'filtered'  => 'Mostrando :count de :total :entity.',
        'hide'      => 'Ocultar filtros',
        'options'   => [
            'exclude'   => 'Excluír',
            'include'   => 'Incluír',
            'none'      => 'Ningún',
        ],
        'show'      => 'Mostrar filtros',
        'sorting'   => [
            'asc'       => 'Ascendente segundo :field',
            'desc'      => 'Descendente segundo :field',
            'helper'    => 'Controla en que orde aparecen os resultados.',
        ],
        'title'     => 'Filtros',
    ],
    'forms'                     => [
        'actions'       => [
            'calendar'  => 'Engadir unha data de calendario',
        ],
        'copy_options'  => 'Opcións de copia',
    ],
    'helpers'                   => [
        'copy_options'  => 'Copiar os seguintes elementos relacionados dende a fonte á nova entidade.',
    ],
    'hidden'                    => 'Oculto',
    'hints'                     => [
        'attribute_template'    => 'Aplica un padrón de atributos directamente ao crear ou editar esta entidade.',
        'calendar_date'         => 'Unha data de calendario permite filtrar facilmente en listas, e tamén asigna un evento ao calendario seleccionado.',
        'gallery_image'         => 'Se a entidade non ten imaxe, mostra unha imaxe da galería da campaña no seu lugar.',
        'header_image'          => 'Esta imaxe é situada enriba da entidade. Para obter os mellores resultados, usa unha imaxe ancha.',
        'image_limitations'     => 'Formatos soportados: jpg, png, e gif. Tamaño máximo do arquivo: :size.',
        'image_patreon'         => 'Queres aumentar o tamaño máximo dos arquivos?',
        'is_private'            => 'Se está marcada como privada, a entidade será visíbel só para usuarios que teñen o rol "Administrador" nesta campaña.',
        'is_star'               => 'Os elementos fixados aparecerán no menú da entidade',
        'map_limitations'       => 'Formatos soportados: jpg, png, gif, e svg. Tamaño máximo do arquivo: :size.',
        'tooltip'               => 'Substitúe a previsualización emerxente por defecto polo seguinte contido.',
        'visibility'            => 'Seleccionando "Administrador", só os usuarios co rol "Administrador" poderán ver isto. "Só eu" significa que só ti poderás velo.',
    ],
    'history'                   => [
        'created'       => 'Creado por <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'created_date'  => 'Creado o <span data-toggle="tooltip" title=":realdate">:date</span>',
        'unknown'       => 'Descoñecido',
        'updated'       => 'Modificado por última vez por <strong>:name</strong> <span data-toggle="tooltip" title=":realdate">:date</span>',
        'updated_date'  => 'Modificado por última vez o <span data-toggle="tooltip" title=":realdate">:date</span>',
        'view'          => 'Ver historial de cambios da entidade',
    ],
    'image'                     => [
        'error' => 'Non fomos capaces de obter a imaxe solicitada. Pode ser que a páxina web non nos deixe descargala (típico de Squarespace e DevianArt), ou pode que a ligazón non sexa válida. Asegúrate de que a imaxe non supera os :size.',
    ],
    'is_not_private'            => 'Actualmente, esta entidade non é privada.',
    'is_private'                => 'Est aentidade é privada e só visíbel para administradoras.',
    'linking_help'              => 'Como enlazar outras entidades?',
    'manage'                    => 'Administrar',
    'move'                      => [
        'description'   => 'Mover esta entidade a outro lugar',
        'errors'        => [
            'permission'        => 'Non tes permiso para crear entidades deste tipo na campaña seleccionada.',
            'same_campaign'     => 'Debes seleccionar outra campaña á que mover a entidade.',
            'unknown_campaign'  => 'Campaña descoñecida.',
        ],
        'fields'        => [
            'campaign'  => 'Nova campaña',
            'copy'      => 'Facer unha copia',
            'target'    => 'Novo tipo',
        ],
        'hints'         => [
            'campaign'  => 'Tamén podes intentar mover esta entidade a outra campaña.',
            'copy'      => 'Selecciona esta opción se queres crear unha copia na nova campaña.',
            'target'    => 'Ten en conta que algúns datos poden perderse ao mover un elemento dun tipo a outro.',
        ],
        'panels'        => [
            'change'    => 'Cambiar tipo de entidade',
            'move'      => 'Mover a outra campaña',
        ],
        'success'       => 'Entidade ":name" movida.',
        'success_copy'  => 'Entidade ":name" copiada.',
        'title'         => 'Mover ":name"',
    ],
    'new_entity'                => [
        'error' => 'Por favor, revisa os valores introducidos.',
        'fields'=> [
            'name'  => 'Nome',
        ],
        'title' => 'Nova entidade',
    ],
    'or_cancel'                 => 'ou <a href=":url">cancelar</a>',
    'panels'                    => [
        'appearance'            => 'Aparencia',
        'attribute_template'    => 'Padrón de atributos',
        'calendar_date'         => 'Data de calendario',
        'entry'                 => 'Entrada',
        'general_information'   => 'Información xeral',
        'move'                  => 'Mover',
        'system'                => 'Sistema',
    ],
    'permissions'               => [
        'action'            => 'Acción',
        'actions'           => [
            'bulk'          => [
                'add'       => 'Permitir',
                'deny'      => 'Denegar',
                'ignore'    => 'Ignorar',
                'remove'    => 'Quitar',
            ],
            'bulk_entity'   => [
                'allow'     => 'Permitir',
                'deny'      => 'Denegar',
                'inherit'   => 'Herdar',
            ],
            'delete'        => 'Eliminar',
            'edit'          => 'Editar',
            'entity_note'   => 'Notas de entidade',
            'read'          => 'Ler',
            'toggle'        => 'Alternar',
        ],
        'allowed'           => 'Permitido',
        'fields'            => [
            'member'    => 'Membra',
            'role'      => 'Rol',
        ],
        'helper'            => 'Usa esta interface para axustar que usuarios e que roles poden interaccionar con esta entidade. :allow',
        'helpers'           => [
            'setup' => 'Usa esta interface para axustar como os diferentes roles e usuarios poden interaccionar con esta entidade. :allow permitirá ao usuario/rol realizar a acción correspondente. :deny non lles deixará realizar a acción. :inherit usará os permisos do rol do usuario ou do rol principal. Un usuario cunha acción establecida en :allow poderá realizar esa acción, aínda que no seu rol esté en :deny.',
        ],
        'inherited'         => 'Este rol xa ten este permiso establecido para este tipo de entidade.',
        'inherited_by'      => 'Este usuario é parte do rol ":role", o cal lle otorga permisos neste tipo de entidade.',
        'success'           => 'Permisos guardados.',
        'title'             => 'Permisos',
        'too_many_members'  => 'Est acampaña ten demasiadas membras (>10) para poder mostralas todas nesta interface. Usa o botón "Permisos" na vista de entidade para controlar os permisos detalladamente.',
    ],
    'placeholders'              => [
        'ability'       => 'Escolle unha habilidade',
        'calendar'      => 'Escolle un calendario',
        'character'     => 'Escolle unha personaxe',
        'entity'        => 'Entidade',
        'event'         => 'Escolle un evento',
        'family'        => 'Escolle unha familia',
        'gallery_image' => 'Escolle unha imaxe da galería da campaña',
        'image_url'     => 'Tamén podes subir unha imaxe dende a súa URL',
        'item'          => 'Escolle un obxeto',
        'journal'       => 'Escolle un caderno',
        'location'      => 'Escolle un lugar',
        'map'           => 'Escolle un mapa',
        'note'          => 'Escolle unha nota',
        'organisation'  => 'Escolle unha organización',
        'race'          => 'Escolle unha raza',
        'tag'           => 'Escolle unha etiqueta',
        'timeline'      => 'Escolle unha liña temporal',
    ],
    'relations'                 => [
        'actions'   => [
            'add'   => 'Engade unha relación',
        ],
        'fields'    => [
            'location'  => 'Localización',
            'name'      => 'Nome',
            'relation'  => 'Relación',
        ],
        'hint'      => 'As relacións entre entidades poden representar como están conectadas entre elas.',
    ],
    'remove'                    => 'Eliminar',
    'rename'                    => 'Renomear',
    'save'                      => 'Guardar',
    'save_and_close'            => 'Guardar e pechar',
    'save_and_copy'             => 'Guardar e copiar',
    'save_and_new'              => 'Guardar e crear nova',
    'save_and_update'           => 'Guardar e editar',
    'save_and_view'             => 'Guardar e visualizar',
    'search'                    => 'Buscar',
    'select'                    => 'Seleccionar',
    'superboosted_campaigns'    => 'Campañas superpotenciadas',
    'tabs'                      => [
        'abilities'     => 'Habilidades',
        'attributes'    => 'Atributos',
        'boost'         => 'Potenciar',
        'calendars'     => 'Calendarios',
        'default'       => 'Por defecto',
        'events'        => 'Eventos',
        'inventory'     => 'Inventario',
        'links'         => 'Ligazóns',
        'map-points'    => 'Puntos do mapa',
        'mentions'      => 'Mencións',
        'menu'          => 'Menú',
        'notes'         => 'Notas da entidade',
        'permissions'   => 'Permisos',
        'relations'     => 'Relacións',
        'reminders'     => 'Lembretes',
        'timelines'     => 'Liñas temporais',
        'tooltip'       => 'Previsualización emerxente',
    ],
    'update'                    => 'Actualizar',
    'users'                     => [
        'unknown'   => 'Descoñecido',
    ],
    'view'                      => 'Ver',
    'visibilities'              => [
        'admin'         => 'Administradoras',
        'admin-self'    => 'Eu e Administradoras',
        'all'           => 'Todas',
        'members'       => 'Integrantes',
        'self'          => 'Só eu',
    ],
];
