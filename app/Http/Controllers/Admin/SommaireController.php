<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSommaireRequest;
use App\Http\Requests\UpdateSommaireRequest;
use App\Models\Sommaire;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SommaireController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('sommaire_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Sommaire::query()->select(sprintf('%s.*', (new Sommaire)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'sommaire_show';
                $editGate      = 'sommaire_edit';
                $deleteGate    = 'sommaire_delete';
                $crudRoutePart = 'sommaires';

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
            $table->editColumn('identifiant', function ($row) {
                return $row->identifiant ? $row->identifiant : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });
            $table->editColumn('montant', function ($row) {
                return $row->montant ? $row->montant : '';
            });
            $table->editColumn('montant_payer', function ($row) {
                return $row->montant_payer ? $row->montant_payer : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('type_payement', function ($row) {
                return $row->type_payement ? $row->type_payement : '';
            });
            $table->editColumn('ask_payement', function ($row) {
                return $row->ask_payement ? $row->ask_payement : '';
            });
            $table->editColumn('confirm_payement', function ($row) {
                return $row->confirm_payement ? $row->confirm_payement : '';
            });
            $table->editColumn('commentaire', function ($row) {
                return $row->commentaire ? $row->commentaire : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.sommaires.index');
    }

    public function create()
    {
        abort_if(Gate::denies('sommaire_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sommaires.create');
    }

    public function store(StoreSommaireRequest $request)
    {
        $sommaire = Sommaire::create($request->all());

        return redirect()->route('admin.sommaires.index');
    }

    public function edit(Sommaire $sommaire)
    {
        abort_if(Gate::denies('sommaire_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sommaires.edit', compact('sommaire'));
    }

    public function update(UpdateSommaireRequest $request, Sommaire $sommaire)
    {
        $sommaire->update($request->all());

        return redirect()->route('admin.sommaires.index');
    }

    public function show(Sommaire $sommaire)
    {
        abort_if(Gate::denies('sommaire_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.sommaires.show', compact('sommaire'));
    }
}
