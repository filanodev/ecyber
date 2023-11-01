<?php

namespace App\Http\Requests;

use App\Models\Country;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCountryRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('country_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'nullable',
            ],
            'name' => [
                'string',
                'required',
            ],
            'phonecode' => [
                'string',
                'nullable',
            ],
            'currency' => [
                'string',
                'nullable',
            ],
            'taux' => [
                'numeric',
            ],
            'timezones' => [
                'string',
                'nullable',
            ],
            'latitude' => [
                'numeric',
            ],
            'longitude' => [
                'numeric',
            ],
        ];
    }
}
