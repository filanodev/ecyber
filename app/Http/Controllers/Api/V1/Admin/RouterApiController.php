<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRouterRequest;
use App\Http\Requests\UpdateRouterRequest;
use App\Http\Resources\Admin\RouterResource;
use App\Models\Router;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RouterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('router_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouterResource(Router::with(['mode_paiement', 'country', 'city'])->get());
    }

    public function store(StoreRouterRequest $request)
    {
        $router = Router::create($request->all());

        return (new RouterResource($router))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Router $router)
    {
        abort_if(Gate::denies('router_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new RouterResource($router->load(['mode_paiement', 'country', 'city']));
    }

    public function update(UpdateRouterRequest $request, Router $router)
    {
        $router->update($request->all());

        return (new RouterResource($router))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Router $router)
    {
        abort_if(Gate::denies('router_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $router->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
