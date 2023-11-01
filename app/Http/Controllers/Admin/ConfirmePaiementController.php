<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyConfirmePaiementRequest;
use App\Http\Requests\StoreConfirmePaiementRequest;
use App\Http\Requests\UpdateConfirmePaiementRequest;
use App\Models\ConfirmePaiement;
use App\Models\ModePaiement;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ConfirmePaiementController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('confirme_paiement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ConfirmePaiement::with(['mode_paiement'])->select(sprintf('%s.*', (new ConfirmePaiement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'confirme_paiement_show';
                $editGate      = 'confirme_paiement_edit';
                $deleteGate    = 'confirme_paiement_delete';
                $crudRoutePart = 'confirme-paiements';

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
            $table->addColumn('mode_paiement_libelle', function ($row) {
                return $row->mode_paiement ? $row->mode_paiement->libelle : '';
            });

            $table->editColumn('payement_ref', function ($row) {
                return $row->payement_ref ? $row->payement_ref : '';
            });
            $table->editColumn('identifiant', function ($row) {
                return $row->identifiant ? $row->identifiant : '';
            });
            $table->editColumn('montant', function ($row) {
                return $row->montant ? $row->montant : '';
            });
            $table->editColumn('compte_payement', function ($row) {
                return $row->compte_payement ? $row->compte_payement : '';
            });
            $table->editColumn('datetime', function ($row) {
                return $row->datetime ? $row->datetime : '';
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? $row->status : '';
            });
            $table->editColumn('commentaire', function ($row) {
                return $row->commentaire ? $row->commentaire : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'mode_paiement']);

            return $table->make(true);
        }

        return view('admin.confirmePaiements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('confirme_paiement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mode_paiements = ModePaiement::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.confirmePaiements.create', compact('mode_paiements'));
    }

    public function store(StoreConfirmePaiementRequest $request)
    {
        $confirmePaiement = ConfirmePaiement::create($request->all());

        return redirect()->route('admin.confirme-paiements.index');
    }

    public function edit(ConfirmePaiement $confirmePaiement)
    {
        abort_if(Gate::denies('confirme_paiement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $mode_paiements = ModePaiement::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $confirmePaiement->load('mode_paiement');

        return view('admin.confirmePaiements.edit', compact('confirmePaiement', 'mode_paiements'));
    }

    public function update(UpdateConfirmePaiementRequest $request, ConfirmePaiement $confirmePaiement)
    {
        $confirmePaiement->update($request->all());

        return redirect()->route('admin.confirme-paiements.index');
    }

    public function show(ConfirmePaiement $confirmePaiement)
    {
        abort_if(Gate::denies('confirme_paiement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confirmePaiement->load('mode_paiement');

        return view('admin.confirmePaiements.show', compact('confirmePaiement'));
    }

    public function destroy(ConfirmePaiement $confirmePaiement)
    {
        abort_if(Gate::denies('confirme_paiement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $confirmePaiement->delete();

        return back();
    }

    public function massDestroy(MassDestroyConfirmePaiementRequest $request)
    {
        $confirmePaiements = ConfirmePaiement::find(request('ids'));

        foreach ($confirmePaiements as $confirmePaiement) {
            $confirmePaiement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
