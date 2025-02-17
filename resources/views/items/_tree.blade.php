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
        'price',
        'size',
        // Location
        [
            'type' => 'location',
            'visible' => $campaignService->enabled('locations'),
        ],
        // Character
        [
            'type' => 'character',
            'visible' => $campaignService->enabled('characters'),
        ],
        [
            'type' => 'is_private',
        ]
    ])
    ->options(    [
        'route' => 'items.tree',
        'baseRoute' => 'items',
        'trans' => 'items.fields.',
        'row' => [
            'data' => [
                'data-children' =>function($model){
                    return $model->items->count();
                }
                ]
            ]
    ]
) !!}
