<?php

namespace App\Http\Requests;

use App\Models\Router;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRouterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('router_create');
    }

    public function rules()
    {
        return [
            'libelle' => [
                'string',
                'required',
            ],
            'dns_name' => [
                'string',
                'required',
            ],
            'active_sms' => [
                'required',
            ],
            'type_serveur' => [
                'required',
            ],
            'map' => [
                'string',
                'nullable',
            ],
        ];
    }
}
