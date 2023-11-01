<?php

namespace App\Http\Requests;

use App\Models\Sommaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSommaireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('sommaire_create');
    }

    public function rules()
    {
        return [
            'identifiant' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'type_payement' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'ask_payement' => [
                'string',
                'nullable',
            ],
            'confirm_payement' => [
                'string',
                'nullable',
            ],
        ];
    }
}
