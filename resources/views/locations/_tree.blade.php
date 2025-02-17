<?php /** @var \App\Renderers\DatagridRenderer $datagrid */?>
@inject ('datagrid', 'App\Renderers\DatagridRenderer')

{!! $datagrid
    ->nested()
    ->service($filterService)
    ->models($models)
    ->columns([
        // Avatar
        [
            'type' => 'avatar'
        ],
        // Name
        'name',
        'type',
        /*[
            'label' => __('locations.fields.location'),
            'render' => function($model) {
                if ($model->parentLocation) {
                    return '<a href="' . route('locations.show', $model->parentLocation->id) . '">' . e($model->parentLocation->name) . '</a>';
                }
            },
            'field' => 'parentLocation.name',
            'disableSort' => true,
        ],*/
        [
            'label' => __('locations.fields.locations'),
            'render' => function($model) {
                return $model->locations->count();
            },
            'disableSort' => true,
        ],
        [
            'label' => __('locations.fields.characters'),
            'visible' => $campaignService->enabled('characters'),
            'render' => function($model) {
                return $model->characters->count();
            },
            'disableSort' => true,
        ],
        [
            'label' => null,
            'field' => 'map',
            'render' => function($model) {
                if (!empty($model->map)) {
                    return '<a href="' . route('locations.map', $model) . '"><i class="fa-solid fa-map"></i></a>';
                }
                return null;
            },
        ],
        [
            'type' => 'is_private',
        ]
    ])
    ->options(    [
        'route' => 'locations.tree',
        'baseRoute' => 'locations',
        'trans' => 'locations.fields.',
        'row' => [
            'data' => [
                'data-children' => function($model) {
                    return $model->locations->count();
                }
            ],
        ]
    ]
) !!}
