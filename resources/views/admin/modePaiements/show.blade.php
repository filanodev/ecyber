@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.modePaiement.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.mode-paiements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $modePaiement->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.country') }}
                                    </th>
                                    <td>
                                        @foreach($modePaiement->countries as $key => $country)
                                            <span class="label label-info">{{ $country->name }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.slog') }}
                                    </th>
                                    <td>
                                        {{ $modePaiement->slog }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.libelle') }}
                                    </th>
                                    <td>
                                        {{ $modePaiement->libelle }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.description') }}
                                    </th>
                                    <td>
                                        {!! $modePaiement->description !!}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.logos') }}
                                    </th>
                                    <td>
                                        @foreach($modePaiement->logos as $key => $media)
                                            <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                <img src="{{ $media->getUrl('thumb') }}">
                                            </a>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\ModePaiement::STATUS_SELECT[$modePaiement->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.api_key') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $modePaiement->api_key ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.site_token') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $modePaiement->site_token ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.notify_url') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $modePaiement->notify_url ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.modePaiement.fields.return_url') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $modePaiement->return_url ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.mode-paiements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection