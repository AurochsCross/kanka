<?php

namespace App\Renderers\Layouts\Journal;

use App\Renderers\Layouts\Columns\Standard;
use App\Renderers\Layouts\Layout;

class Journal extends Layout
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
            'journal' => [
                'key' => 'name',
                'label' => 'entities.journal',
                'render' => Standard::ENTITYLINK,
            ],
            'author' => [
                'key' => 'author.name',
                'label' => 'journals.fields.author',
                'render' => function ($model) {
                    if (!$model->author) {
                        return null;
                    }
                    return $model->author->tooltipedLink();
                },
            ],
        ];

        return $columns;
    }
}
