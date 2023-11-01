<?php

namespace App\Http\Requests;

use App\Models\ModePaiement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreModePaiementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('mode_paiement_create');
    }

    public function rules()
    {
        return [
            'countries.*' => [
                'integer',
            ],
            'countries' => [
                'array',
            ],
            'slog' => [
                'string',
                'nullable',
            ],
            'libelle' => [
                'string',
                'required',
            ],
            'logos' => [
                'array',
            ],
        ];
    }
}
