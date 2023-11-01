<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPriceRequest;
use App\Http\Requests\StorePriceRequest;
use App\Http\Requests\UpdatePriceRequest;
use App\Models\Price;
use App\Models\Router;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PriceController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('price_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Price::with(['router', 'users'])->select(sprintf('%s.*', (new Price)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'price_show';
                $editGate      = 'price_edit';
                $deleteGate    = 'price_delete';
                $crudRoutePart = 'prices';

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
            $table->addColumn('router_libelle', function ($row) {
                return $row->router ? $row->router->libelle : '';
            });

            $table->editColumn('libelle', function ($row) {
                return $row->libelle ? $row->libelle : '';
            });
            $table->editColumn('price_sell', function ($row) {
                return $row->price_sell ? $row->price_sell : '';
            });
            $table->addColumn('users_name', function ($row) {
                return $row->users ? $row->users->name : '';
            });

            $table->editColumn('users.email', function ($row) {
                return $row->users ? (is_string($row->users) ? $row->users : $row->users->email) : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Price::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'router', 'users']);

            return $table->make(true);
        }

        return view('admin.prices.index');
    }

    public function create()
    {
        abort_if(Gate::denies('price_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routers = Router::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.prices.create', compact('routers', 'users'));
    }

    public function store(StorePriceRequest $request)
    {
        $price = Price::create($request->all());

        return redirect()->route('admin.prices.index');
    }

    public function edit(Price $price)
    {
        abort_if(Gate::denies('price_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $routers = Router::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $price->load('router', 'users');

        return view('admin.prices.edit', compact('price', 'routers', 'users'));
    }

    public function update(UpdatePriceRequest $request, Price $price)
    {
        $price->update($request->all());

        return redirect()->route('admin.prices.index');
    }

    public function show(Price $price)
    {
        abort_if(Gate::denies('price_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price->load('router', 'users');

        return view('admin.prices.show', compact('price'));
    }

    public function destroy(Price $price)
    {
        abort_if(Gate::denies('price_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $price->delete();

        return back();
    }

    public function massDestroy(MassDestroyPriceRequest $request)
    {
        $prices = Price::find(request('ids'));

        foreach ($prices as $price) {
            $price->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
