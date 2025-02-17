<?php

namespace App\Http\Requests;

use App\Traits\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreJournal extends FormRequest
{
    use ApiRequest;

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
            'date' => 'nullable|date',
            'image' => 'mimes:jpeg,png,jpg,gif,webp|max:' . auth()->user()->maxUploadSize(),
            'character_id' => 'nullable|exists:characters,id',
            'image_url' => 'nullable|url|active_url',
            'template_id' => 'nullable',
            'journal_id' => 'nullable|integer|exists:journals,id',
        ];

        if (request()->has('calendar_id') && request()->post('calendar_id') !== null && !request()->has('calendar_skip')) {
            $rules['calendar_day'] = 'required_with:calendar_id|min:1';
            $rules['calendar_year'] = 'required_with:calendar_id';

            if (request()->has('length')) {
                $rules['length'] = 'required_with:calendar_id|min:1';
            }
        }
        $self = request()->segment(5);
        if (!empty($self)) {
            $rules['journal_id'] = 'nullable|integer|not_in:' . ((int) $self) . '|exists:journals,id';
        }

        return $this->clean($rules);
    }
}
