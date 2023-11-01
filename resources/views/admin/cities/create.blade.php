@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.city.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.cities.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('state') ? 'has-error' : '' }}">
                            <label for="state_id">{{ trans('cruds.city.fields.state') }}</label>
                            <select class="form-control select2" name="state_id" id="state_id">
                                @foreach($states as $id => $entry)
                                    <option value="{{ $id }}" {{ old('state_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('state'))
                                <span class="help-block" role="alert">{{ $errors->first('state') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.state_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.city.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                            <label for="latitude">{{ trans('cruds.city.fields.latitude') }}</label>
                            <input class="form-control" type="number" name="latitude" id="latitude" value="{{ old('latitude', '') }}" step="0.00000001">
                            @if($errors->has('latitude'))
                                <span class="help-block" role="alert">{{ $errors->first('latitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.latitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                            <label for="longitude">{{ trans('cruds.city.fields.longitude') }}</label>
                            <input class="form-control" type="number" name="longitude" id="longitude" value="{{ old('longitude', '') }}" step="0.00000001">
                            @if($errors->has('longitude'))
                                <span class="help-block" role="alert">{{ $errors->first('longitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.longitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.city.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\City::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.city.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection