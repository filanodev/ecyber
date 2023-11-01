<?php

namespace App\Http\Requests;

use App\Models\Price;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePriceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('price_create');
    }

    public function rules()
    {
        return [
            'router_id' => [
                'required',
                'integer',
            ],
            'libelle' => [
                'string',
                'required',
            ],
            'price_sell' => [
                'required',
            ],
            'users_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
