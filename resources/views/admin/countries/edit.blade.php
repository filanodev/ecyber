@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.country.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.countries.update", [$country->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="code">{{ trans('cruds.country.fields.code') }}</label>
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $country->code) }}">
                            @if($errors->has('code'))
                                <span class="help-block" role="alert">{{ $errors->first('code') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.country.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $country->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('phonecode') ? 'has-error' : '' }}">
                            <label for="phonecode">{{ trans('cruds.country.fields.phonecode') }}</label>
                            <input class="form-control" type="text" name="phonecode" id="phonecode" value="{{ old('phonecode', $country->phonecode) }}">
                            @if($errors->has('phonecode'))
                                <span class="help-block" role="alert">{{ $errors->first('phonecode') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.phonecode_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('currency') ? 'has-error' : '' }}">
                            <label for="currency">{{ trans('cruds.country.fields.currency') }}</label>
                            <input class="form-control" type="text" name="currency" id="currency" value="{{ old('currency', $country->currency) }}">
                            @if($errors->has('currency'))
                                <span class="help-block" role="alert">{{ $errors->first('currency') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.currency_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('taux') ? 'has-error' : '' }}">
                            <label for="taux">{{ trans('cruds.country.fields.taux') }}</label>
                            <input class="form-control" type="number" name="taux" id="taux" value="{{ old('taux', $country->taux) }}" step="0.01">
                            @if($errors->has('taux'))
                                <span class="help-block" role="alert">{{ $errors->first('taux') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.taux_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('timezones') ? 'has-error' : '' }}">
                            <label for="timezones">{{ trans('cruds.country.fields.timezones') }}</label>
                            <input class="form-control" type="text" name="timezones" id="timezones" value="{{ old('timezones', $country->timezones) }}">
                            @if($errors->has('timezones'))
                                <span class="help-block" role="alert">{{ $errors->first('timezones') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.timezones_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
                            <label for="latitude">{{ trans('cruds.country.fields.latitude') }}</label>
                            <input class="form-control" type="number" name="latitude" id="latitude" value="{{ old('latitude', $country->latitude) }}" step="0.00000001">
                            @if($errors->has('latitude'))
                                <span class="help-block" role="alert">{{ $errors->first('latitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.latitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
                            <label for="longitude">{{ trans('cruds.country.fields.longitude') }}</label>
                            <input class="form-control" type="number" name="longitude" id="longitude" value="{{ old('longitude', $country->longitude) }}" step="0.00000001">
                            @if($errors->has('longitude'))
                                <span class="help-block" role="alert">{{ $errors->first('longitude') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.longitude_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.country.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Country::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $country->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.country.fields.status_helper') }}</span>
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