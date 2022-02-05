<?php

return [
    'age'               => [
        'description'   => 'Se puede vincular un personaje a un calendario de campaña desde la pestaña de Recordatorios del personaje. Desde allí, añade un nuevo recordatorio y dale el tipo Nacimiento o Muerte para calcular automáticamente la edad del personaje. Si ambas fechas están presentes, se mostrarán las dos junto con la edad de fallecimiento. Si solo se ha indicado el nacimiento, se mostrarán la fecha y la edad actual. Si solo se ha indicado la muerte, se mostrarán la fecha y los años desde la muerte.',
        'title'         => 'Edad y muerte de los personajes',
    ],
    'api-filters'       => [
        'description'   => 'Están disponibles los siguientes filtros para el endpoint :name de la API.',
        'title'         => 'Filtros de la API',
    ],
    'attributes'        => [
        'con'               => 'Con',
        'description'       => 'Puedes usar atributos para representar valores no textuales de una entidad. Puedes hacer referencia a otras entidades dentro de un atributo usando la sintaxis de :mention avanzada. También puedes vincular otros atributos usando la sintaxis de :attribute.',
        'level'             => 'Nivel',
        'link'              => 'Opciones de atributos',
        'math'              => 'También puedes ponerte creativo con algunas matemáticas básicas. Por ejemplo, :example hará la multiplicación de los atributos :level y :con de esta entidad. Si quieres redondear el resultado hacia arriba o abajo, puedes usar :floor o :ceil respectivamente.',
        'name'              => 'Puedes referenciar el nombre de la entidad con :name. Si existe un atributo con ese nombre, se usará dicho atributo.',
        'pinned'            => 'Al fijar un atributo mediante el icono de :icono, aparecerá en el menú de la entidad bajo la imagen.',
        'private'           => 'Los atributos privados con el icono de :icon solo son visibles para los administradores de la campaña.',
        'random'            => 'Al crear o editar una plantilla de atributos, puedes definir atributos aleatorios. Pueden ser un valor aleatorio entre dos números separados por un :dash, o un valor aleatorio de una lista de valores separados por :comma. El valor del atributo se determina cuando la plantilla se aplica a una entidad o cuando la entidad se guarda.',
        'random_examples'   => 'Por ejemplo, si quieres un número entre 1 y 100, usa :number. Si quieres un valor entre una lista de opciones, usa :list.',
        'title'             => 'Atributos',
    ],
    'dice'              => [
        'description'               => 'Puedes hacer tiradas de dados genéricas escribiendo "d20", "4d4+4", "d%" para porcentual y "df" para fudge.',
        'description_attributes'    => 'También se puede obtener el atributo de un personaje utilizando el código {character.nombre_atributo}. Por ejemplo: {character.nivel}d6+{character.sabiduria}.',
        'more'                      => 'Para ver más opciones disponibles, puedes buscar en la página web del plugin de dados.',
        'title'                     => 'Tiradas de dados',
    ],
    'entity_templates'  => [
        'description'   => 'Al crear nuevas entidades, puedes crear una basada en una plantilla en vez de empezar desde cero. Para definir una entidad como plantilla, ábrela y haz clic en :link en el botón de :action arriba a la derecha. En la lista de entidades, verás las plantillas disponibles junto al botón de :new. Puedes tener múltiples plantillas para cada tipo de entidad.',
        'link'          => 'Cómo definir plantillas',
        'remove'        => 'Para eliminar una plantilla de entidad, haz clic en el botón de :remove que reemplaza el :link previamente descrito.',
        'title'         => 'Plantillas de entidad',
    ],
    'filters'           => [
        'attributes'    => [
            'exclude'   => '!Nivel',
        ],
        'clipboard'     => 'Cuando haya filtros puestos, se activará el botón de copiar, con el que puedes copiar dichos filtros al portapapeles y usarlos para los widgets del tablero o los enlaces del acceso rápido.',
        'description'   => 'Puedes usar los filtros para limitar la cantidad de resultados que se muestra en las listas. Se puede filtrar por más de un campo para controlar detalladamente qué se excluye con los filtros.',
        'empty'         => 'Si escribes :tag en un campo, se buscarán todas las entidades donde este campo esté vacío.',
        'ending_with'   => 'Poniendo una :tag al final del texto, puedes buscar todas las demás entidades con este texto en ese campo.',
        'multiple'      => 'Se pueden combinar opciones de búsqueda en los campos de texto escribiendo :syntax. Por ejemplo, :example.',
        'session'       => 'Los filtros y el orden de las columnas en la lista de entidades se guardan en tu sesión, así que mientras te mantengas conectada no necesitarás volverlas a configurar en cada página.',
        'starting_with' => 'Añadiendo :tag antes del texto, puedes buscar cualquier entidad que no contenga el texto en ese campo.',
        'title'         => 'Cómo usar los filtros',
    ],
    'link'              => [
        'attributes'        => 'Puedes vincular atributos de la entidad escribiendo :code. Esto solo funciona para los atributos existentes de la entidad.',
        'auto_update'       => 'Los enlaces a otras entidades se actualizarán automáticamente cuando se cambie el nombre o la descripción de éstas.',
        'description'       => 'Puedes enlazar fácilmente otras entidades usando los siguientes atajos.',
        'formatting'        => [
            'text'  => 'La lista de etiquetas y atributos HTML permitidos se encuentra en nuestro :github.',
            'title' => 'Formato',
        ],
        'friendly_mentions' => 'Enlaza a otras entidades escribiendo :code y los primeros caracteres de una entidad para buscarla. Esto insertará :example en el editor de texto, y se mostrará como un enlace a la entidad al ver dicha entidad.',
        'limitations'       => 'Ten en cuenta que debido a limitaciones técnicas estos atajos no funcionan en dispositivos móviles android.',
        'mention_helpers'   => 'Si el nombre de la entidad contiene un espacio, usa :example en vez del espacio. Si quieres buscar una entidad con exactamente ese nombre, escribe :exact.',
        'mentions'          => 'Enlaza a otras entidades escribiendo :code y los primeros caracteres de una entidad para buscarla. Esto introducirá :example en el editor de texto. Para personalizar el nombre a mostrar, puedes escribir :example_name. Para indicar una subpágina concreta de la entidad, usa :example_page. Para indicar una pestaña concreta, usa :example_tab.',
        'mentions_field'    => 'También puedes mostrar un campo de la entidad en lugar de su nombre en el link con :code.',
        'months'            => 'Escribe :code para obtener una lista con los meses de tus calendarios.',
        'options'           => 'Algunas opciones son :options.',
        'title'             => 'Enlazar a otras entidades y atajos',
    ],
    'map'               => [
        'description'   => 'Al subir un mapa a un lugar, se habilitará el menú de Mapa en la página de ese lugar con un enlace directo al mapa. Desde la vista de mapa, los usuarios que tienen permiso para editar la localización podrán, a su vez, editar el mapa y añadirle puntos. Estos pueden enlazar a una entidad existente o ser simples etiquetas, y pueden tener varias formas y tamaños.',
        'private'       => 'Los administradores de la campaña pueden hacer que un mapa sea privado. Esto permite que los usuarios puedan ver un lugar, pero los admins puedan mantener el mapa en secreto.',
        'title'         => 'Mapas de los lugares',
    ],
    'pins'              => [
        'description'   => 'Las entidades pueden fijar relaciones y atributos a la derecha de la vista de Historia. Para fijar un elemento, edita la relación o los atributos y activa la opción de fijar.',
        'title'         => 'Chinchetas',
    ],
    'public'            => 'Mira el vídeo tutorial en Youtube acerca de las campañas públicas.',
    'title'             => 'Consejos',
    'troubleshooting'   => [
        'errors'            => [
            'token_exists'  => 'Ya existe un token para :campaign.',
        ],
        'save_btn'          => 'Generar token',
        'select_campaign'   => 'Seleccionar una campaña',
        'subtitle'          => '¡Ayuda, por favor!',
        'success'           => 'Copia el siguiente token y envíalo a alguien del equipo de Kanka.',
        'title'             => 'Resolución de problemas',
    ],
    'widget-filters'    => [
        'description'   => 'Puedes filtrar las entidades mostradas en el widget de recientemente modificadas mediante sus campos y valores. Por ejemplo, puedes usar :example para filtrar por personajes muertos de tipo NPC.',
        'link'          => 'filtros de widget',
        'more'          => 'Puedes copiar los valores de la URL en la lista de entidades. Por ejemplo, al visualizar los personajes de la campaña, filtra qué tipo de personajes deseas mostrar, y copia los valores que hay después de :question en la URL.',
        'title'         => 'Filtrar los widgets del tablero',
    ],
];
