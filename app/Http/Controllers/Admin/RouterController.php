<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRouterRequest;
use App\Http\Requests\StoreRouterRequest;
use App\Http\Requests\UpdateRouterRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\ModePaiement;
use App\Models\Router;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RouterController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('router_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Router::with(['mode_paiement', 'country', 'city'])->select(sprintf('%s.*', (new Router)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'router_show';
                $editGate      = 'router_edit';
                $deleteGate    = 'router_delete';
                $crudRoutePart = 'routers';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('libelle', function ($row) {
                return $row->libelle ? $row->libelle : '';
            });
            $table->editColumn('contact', function ($row) {
                return $row->contact ? $row->contact : '';
            });
            $table->editColumn('dns_name', function ($row) {
                return $row->dns_name ? $row->dns_name : '';
            });
            $table->editColumn('active_sms', function ($row) {
                return $row->active_sms ? Router::ACTIVE_SMS_SELECT[$row->active_sms] : '';
            });
            $table->editColumn('type_serveur', function ($row) {
                return $row->type_serveur ? Router::TYPE_SERVEUR_SELECT[$row->type_serveur] : '';
            });
            $table->editColumn('payement_token', function ($row) {
                return $row->payement_token ? $row->payement_token : '';
            });
            $table->addColumn('mode_paiement_libelle', function ($row) {
                return $row->mode_paiement ? $row->mode_paiement->libelle : '';
            });

            $table->addColumn('country_name', function ($row) {
                return $row->country ? $row->country->name : '';
            });

            $table->addColumn('city_name', function ($row) {
                return $row->city ? $row->city->name : '';
            });

            $table->editColumn('map', function ($row) {
                return $row->map ? $row->map : '';
            });
            $table->editColumn('active_pub_local', function ($row) {
                return $row->active_pub_local ? Router::ACTIVE_PUB_LOCAL_SELECT[$row->active_pub_local] : '';
            });
            $table->editColumn('active_bup_global', function ($row) {
                return $row->active_bup_global ? Router::ACTIVE_BUP_GLOBAL_SELECT[$row->active_bup_global] : '';
            });
            $table->editColumn('active_vpn', function ($row) {
                return $row->active_vpn ? Router::ACTIVE_VPN_SELECT[$row->active_vpn] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'mode_paiement', 'country', 'city']);

            return $table->make(true);
        }

        return view('admin.routers.index');
    }

    public function create()
    {
        abort_if(Gate::denies('router_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mode_paiements = ModePaiement::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.routers.create', compact('cities', 'countries', 'mode_paiements'));
    }

    public function store(StoreRouterRequest $request)
    {
        $router = Router::create($request->all());

        return redirect()->route('admin.routers.index');
    }

    public function edit(Router $router)
    {
        abort_if(Gate::denies('router_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mode_paiements = ModePaiement::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $router->load('mode_paiement', 'country', 'city');

        return view('admin.routers.edit', compact('cities', 'countries', 'mode_paiements', 'router'));
    }

    public function update(UpdateRouterRequest $request, Router $router)
    {
        $router->update($request->all());

        return redirect()->route('admin.routers.index');
    }

    public function show(Router $router)
    {
        abort_if(Gate::denies('router_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $router->load('mode_paiement', 'country', 'city');

        return view('admin.routers.show', compact('router'));
    }

    public function destroy(Router $router)
    {
        abort_if(Gate::denies('router_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $router->delete();

        return back();
    }

    public function massDestroy(MassDestroyRouterRequest $request)
    {
        $routers = Router::find(request('ids'));

        foreach ($routers as $router) {
            $router->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
