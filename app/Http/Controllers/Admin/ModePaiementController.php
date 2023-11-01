<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyModePaiementRequest;
use App\Http\Requests\StoreModePaiementRequest;
use App\Http\Requests\UpdateModePaiementRequest;
use App\Models\Country;
use App\Models\ModePaiement;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ModePaiementController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('mode_paiement_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ModePaiement::with(['countries'])->select(sprintf('%s.*', (new ModePaiement)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'mode_paiement_show';
                $editGate      = 'mode_paiement_edit';
                $deleteGate    = 'mode_paiement_delete';
                $crudRoutePart = 'mode-paiements';

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
            $table->editColumn('country', function ($row) {
                $labels = [];
                foreach ($row->countries as $country) {
                    $labels[] = sprintf('<span class="label label-info label-many">%s</span>', $country->name);
                }

                return implode(' ', $labels);
            });
            $table->editColumn('slog', function ($row) {
                return $row->slog ? $row->slog : '';
            });
            $table->editColumn('libelle', function ($row) {
                return $row->libelle ? $row->libelle : '';
            });
            $table->editColumn('logos', function ($row) {
                if (! $row->logos) {
                    return '';
                }
                $links = [];
                foreach ($row->logos as $media) {
                    $links[] = '<a href="' . $media->getUrl() . '" target="_blank"><img src="' . $media->getUrl('thumb') . '" width="50px" height="50px"></a>';
                }

                return implode(' ', $links);
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ModePaiement::STATUS_SELECT[$row->status] : '';
            });
            $table->editColumn('api_key', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->api_key ? 'checked' : null) . '>';
            });
            $table->editColumn('site_token', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->site_token ? 'checked' : null) . '>';
            });
            $table->editColumn('notify_url', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->notify_url ? 'checked' : null) . '>';
            });
            $table->editColumn('return_url', function ($row) {
                return '<input type="checkbox" disabled ' . ($row->return_url ? 'checked' : null) . '>';
            });

            $table->rawColumns(['actions', 'placeholder', 'country', 'logos', 'api_key', 'site_token', 'notify_url', 'return_url']);

            return $table->make(true);
        }

        return view('admin.modePaiements.index');
    }

    public function create()
    {
        abort_if(Gate::denies('mode_paiement_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id');

        return view('admin.modePaiements.create', compact('countries'));
    }

    public function store(StoreModePaiementRequest $request)
    {
        $modePaiement = ModePaiement::create($request->all());
        $modePaiement->countries()->sync($request->input('countries', []));
        foreach ($request->input('logos', []) as $file) {
            $modePaiement->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('logos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $modePaiement->id]);
        }

        return redirect()->route('admin.mode-paiements.index');
    }

    public function edit(ModePaiement $modePaiement)
    {
        abort_if(Gate::denies('mode_paiement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id');

        $modePaiement->load('countries');

        return view('admin.modePaiements.edit', compact('countries', 'modePaiement'));
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

        return redirect()->route('admin.mode-paiements.index');
    }

    public function show(ModePaiement $modePaiement)
    {
        abort_if(Gate::denies('mode_paiement_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modePaiement->load('countries');

        return view('admin.modePaiements.show', compact('modePaiement'));
    }

    public function destroy(ModePaiement $modePaiement)
    {
        abort_if(Gate::denies('mode_paiement_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $modePaiement->delete();

        return back();
    }

    public function massDestroy(MassDestroyModePaiementRequest $request)
    {
        $modePaiements = ModePaiement::find(request('ids'));

        foreach ($modePaiements as $modePaiement) {
            $modePaiement->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('mode_paiement_create') && Gate::denies('mode_paiement_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ModePaiement();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
