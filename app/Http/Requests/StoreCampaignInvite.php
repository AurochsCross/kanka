<?php

namespace App\Http\Requests;

use App\Models\CampaignInvite;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCampaignInvite extends FormRequest
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
            'role_id' => 'required|exists:campaign_roles,id',
            'validity' => 'nullable|integer',
        ];

        return $rules;
    }
}
