<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyTicketRequest;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Models\Router;
use App\Models\Ticket;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class TicketController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('ticket_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Ticket::with(['users', 'router'])->select(sprintf('%s.*', (new Ticket)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'ticket_show';
                $editGate      = 'ticket_edit';
                $deleteGate    = 'ticket_delete';
                $crudRoutePart = 'tickets';

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
            $table->editColumn('login', function ($row) {
                return $row->login ? $row->login : '';
            });
            $table->editColumn('password', function ($row) {
                return $row->password ? $row->password : '';
            });
            $table->editColumn('etat', function ($row) {
                return $row->etat ? Ticket::ETAT_SELECT[$row->etat] : '';
            });
            $table->addColumn('users_name', function ($row) {
                return $row->users ? $row->users->name : '';
            });

            $table->addColumn('router_libelle', function ($row) {
                return $row->router ? $row->router->libelle : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'users', 'router']);

            return $table->make(true);
        }

        return view('admin.tickets.index');
    }

    public function create()
    {
        abort_if(Gate::denies('ticket_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routers = Router::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.tickets.create', compact('routers', 'users'));
    }

    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create($request->all());

        return redirect()->route('admin.tickets.index');
    }

    public function edit(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $routers = Router::pluck('libelle', 'id')->prepend(trans('global.pleaseSelect'), '');

        $ticket->load('users', 'router');

        return view('admin.tickets.edit', compact('routers', 'ticket', 'users'));
    }

    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        $ticket->update($request->all());

        return redirect()->route('admin.tickets.index');
    }

    public function show(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->load('users', 'router');

        return view('admin.tickets.show', compact('ticket'));
    }

    public function destroy(Ticket $ticket)
    {
        abort_if(Gate::denies('ticket_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ticket->delete();

        return back();
    }

    public function massDestroy(MassDestroyTicketRequest $request)
    {
        $tickets = Ticket::find(request('ids'));

        foreach ($tickets as $ticket) {
            $ticket->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
