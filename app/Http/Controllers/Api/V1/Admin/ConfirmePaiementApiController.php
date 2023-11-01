<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConfirmePaiementRequest;
use App\Http\Requests\UpdateConfirmePaiementRequest;
use App\Http\Resources\Admin\ConfirmePaiementResource;
use App\Models\ConfirmePaiement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConfirmePaiementApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('confirme_paiement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfirmePaiementResource(ConfirmePaiement::with(['mode_paiement'])->get());
    }

    public function store(StoreConfirmePaiementRequest $request)
    {
        $confirmePaiement = ConfirmePaiement::create($request->all());

        return (new ConfirmePaiementResource($confirmePaiement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ConfirmePaiement $confirmePaiement)
    {
        abort_if(Gate::denies('confirme_paiement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ConfirmePaiementResource($confirmePaiement->load(['mode_paiement']));
    }

    public function update(UpdateConfirmePaiementRequest $request, ConfirmePaiement $confirmePaiement)
    {
        $confirmePaiement->update($request->all());

        return (new ConfirmePaiementResource($confirmePaiement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ConfirmePaiement $confirmePaiement)
    {
        abort_if(Gate::denies('confirme_paiement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confirmePaiement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
