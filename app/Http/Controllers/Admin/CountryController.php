<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\UpdateCountryRequest;
use App\Models\Country;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CountryController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('country_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Country::query()->select(sprintf('%s.*', (new Country)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'country_show';
                $editGate      = 'country_edit';
                $deleteGate    = 'country_delete';
                $crudRoutePart = 'countries';

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
            $table->editColumn('code', function ($row) {
                return $row->code ? $row->code : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('phonecode', function ($row) {
                return $row->phonecode ? $row->phonecode : '';
            });
            $table->editColumn('currency', function ($row) {
                return $row->currency ? $row->currency : '';
            });
            $table->editColumn('taux', function ($row) {
                return $row->taux ? $row->taux : '';
            });
            $table->editColumn('timezones', function ($row) {
                return $row->timezones ? $row->timezones : '';
            });
            $table->editColumn('latitude', function ($row) {
                return $row->latitude ? $row->latitude : '';
            });
            $table->editColumn('longitude', function ($row) {
                return $row->longitude ? $row->longitude : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Country::STATUS_SELECT[$row->status] : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.countries.index');
    }

    public function edit(Country $country)
    {
        abort_if(Gate::denies('country_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.edit', compact('country'));
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->all());

        return redirect()->route('admin.countries.index');
    }

    public function show(Country $country)
    {
        abort_if(Gate::denies('country_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.countries.show', compact('country'));
    }
}
