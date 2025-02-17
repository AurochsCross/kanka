<?php

namespace App\Http\Requests;

use App\Models\EntityAsset;
use App\Rules\EntityFileRule;
use App\Rules\FontAwesomeIcon;
use App\Traits\ApiRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreEntityAsset extends FormRequest
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
        return $this->clean([
            'name' => 'required_unless:type_id,' . EntityAsset::TYPE_FILE . '|max:45',
            'visibility_id' => 'integer',
            'file' => [
                'required_if:type_id,' . EntityAsset::TYPE_FILE,
                'file',
                'max:' . auth()->user()->maxUploadSize(),
                new EntityFileRule()
            ],
            'metadata.url' => 'required_if:type_id,' . EntityAsset::TYPE_LINK . '|string|url',
            'metadata.icon' => ['max:45', new FontAwesomeIcon()],
        ]);
    }
}
