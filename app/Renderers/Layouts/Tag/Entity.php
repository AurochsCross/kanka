<?php

namespace App\Renderers\Layouts\Tag;

use App\Renderers\Layouts\Columns\Standard;
use App\Renderers\Layouts\Layout;

class Entity extends Layout
{
    /**
     * Available columns
     * @return array[]
     */
    public function columns(): array
    {
        $columns = [
            'image' => [
                'render' => Standard::IMAGE
            ],
            'name' => [
                'key' => 'name',
                'label' => 'entities.tag',
                'render' => Standard::ENTITYLINK,
            ],
            'type' => [
                'key' => 'type_id',
                'label' => 'crud.fields.entity_type',
                'render' => function ($model) {
                    return __('entities.' . $model->pluralType());
                }
            ],

        ];

        return $columns;
    }
}
