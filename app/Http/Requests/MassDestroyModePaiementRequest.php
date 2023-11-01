<?php

namespace App\Http\Requests;

use App\Models\ModePaiement;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyModePaiementRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('mode_paiement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:mode_paiements,id',
        ];
    }
}
