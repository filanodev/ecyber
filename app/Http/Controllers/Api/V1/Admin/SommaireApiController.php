<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSommaireRequest;
use App\Http\Requests\UpdateSommaireRequest;
use App\Http\Resources\Admin\SommaireResource;
use App\Models\Sommaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SommaireApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sommaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SommaireResource(Sommaire::all());
    }

    public function store(StoreSommaireRequest $request)
    {
        $sommaire = Sommaire::create($request->all());

        return (new SommaireResource($sommaire))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sommaire $sommaire)
    {
        abort_if(Gate::denies('sommaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SommaireResource($sommaire);
    }

    public function update(UpdateSommaireRequest $request, Sommaire $sommaire)
    {
        $sommaire->update($request->all());

        return (new SommaireResource($sommaire))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }
}
