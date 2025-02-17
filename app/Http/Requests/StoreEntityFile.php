<?php

namespace App\Http\Requests;

use App\Rules\EntityFileRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreEntityFile extends FormRequest
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
            'file' => [
                'required',
                'file',
                'max:' . auth()->user()->maxUploadSize(),
                new EntityFileRule
            ],
            'name' => 'nullable|string|max:45',
            'visibility_id' => 'nullable|exists:visibilities,id'
        ];
    }
}
