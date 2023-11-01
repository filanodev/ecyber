<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreModePaiementRequest;
use App\Http\Requests\UpdateModePaiementRequest;
use App\Http\Resources\Admin\ModePaiementResource;
use App\Models\ModePaiement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ModePaiementApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('mode_paiement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ModePaiementResource(ModePaiement::with(['countries'])->get());
    }

    public function store(StoreModePaiementRequest $request)
    {
        $modePaiement = ModePaiement::create($request->all());
        $modePaiement->countries()->sync($request->input('countries', []));
        foreach ($request->input('logos', []) as $file) {
            $modePaiement->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('logos');
        }

        return (new ModePaiementResource($modePaiement))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ModePaiement $modePaiement)
    {
        abort_if(Gate::denies('mode_paiement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ModePaiementResource($modePaiement->load(['countries']));
    }

    public function update(UpdateModePaiementRequest $request, ModePaiement $modePaiement)
    {
        $modePaiement->update($request->all());
        $modePaiement->countries()->sync($request->input('countries', []));
        if (count($modePaiement->logos) > 0) {
            foreach ($modePaiement->logos as $media) {
                if (! in_array($media->file_name, $request->input('logos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $modePaiement->logos->pluck('file_name')->toArray();
        foreach ($request->input('logos', []) as $file) {
            if (count($media) === 0 || ! in_array($file, $media)) {
                $modePaiement->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('logos');
            }
        }

        return (new ModePaiementResource($modePaiement))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ModePaiement $modePaiement)
    {
        abort_if(Gate::denies('mode_paiement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modePaiement->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
