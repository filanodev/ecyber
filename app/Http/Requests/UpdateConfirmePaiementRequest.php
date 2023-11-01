<?php

namespace App\Http\Requests;

use App\Models\ConfirmePaiement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateConfirmePaiementRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('confirme_paiement_edit');
    }

    public function rules()
    {
        return [
            'payement_ref' => [
                'string',
                'nullable',
            ],
            'identifiant' => [
                'string',
                'nullable',
            ],
            'compte_payement' => [
                'string',
                'nullable',
            ],
            'datetime' => [
                'string',
                'nullable',
            ],
            'status' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
        ];
    }
}
