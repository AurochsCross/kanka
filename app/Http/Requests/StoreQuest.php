<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuest extends FormRequest
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
        $rules = [
            'name' => 'required|max:191',
            'type' => 'nullable|max:45',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:' . auth()->user()->maxUploadSize(),
            'image_url' => 'nullable|url|active_url',
            'quest_id', 'nullable|integer|exists:quests,id',
            'character_id' => 'nullable|integer|exists:characters,id',
            'template_id' => 'nullable|exists:attribute_templates,id',
        ];

        if (request()->has('calendar_id') && request()->post('calendar_id') !== null) {
            $rules['length'] = 'required_with:calendar_id|min:1';
            $rules['calendar_day'] = 'required_with:calendar_id|min:1';
            $rules['calendar_year'] = 'required_with:calendar_id';
        }

        return $rules;
    }
}
