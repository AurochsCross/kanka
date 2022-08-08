<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReorderStories extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'posts' => [
                '*' => [
                    'id' => 'exists:entity_notes,id',
                    'visibility_id' => 'exists:visibilities,id'
                ],
            ]
        ];
    }
}
