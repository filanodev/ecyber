@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.state.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.states.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                            <label for="country_id">{{ trans('cruds.state.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id">
                                @foreach($countries as $id => $entry)
                                    <option value="{{ $id }}" {{ old('country_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <span class="help-block" role="alert">{{ $errors->first('country') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.state.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.state.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.state.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('statut') ? 'has-error' : '' }}">
                            <label for="statut">{{ trans('cruds.state.fields.statut') }}</label>
                            <input class="form-control" type="number" name="statut" id="statut" value="{{ old('statut', '0') }}" step="1">
                            @if($errors->has('statut'))
                                <span class="help-block" role="alert">{{ $errors->first('statut') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.state.fields.statut_helper') }}</span>
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