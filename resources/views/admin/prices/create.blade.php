@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.price.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.prices.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('router') ? 'has-error' : '' }}">
                            <label class="required" for="router_id">{{ trans('cruds.price.fields.router') }}</label>
                            <select class="form-control select2" name="router_id" id="router_id" required>
                                @foreach($routers as $id => $entry)
                                    <option value="{{ $id }}" {{ old('router_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('router'))
                                <span class="help-block" role="alert">{{ $errors->first('router') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.price.fields.router_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">
                            <label class="required" for="libelle">{{ trans('cruds.price.fields.libelle') }}</label>
                            <input class="form-control" type="text" name="libelle" id="libelle" value="{{ old('libelle', '') }}" required>
                            @if($errors->has('libelle'))
                                <span class="help-block" role="alert">{{ $errors->first('libelle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.price.fields.libelle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('price_sell') ? 'has-error' : '' }}">
                            <label class="required" for="price_sell">{{ trans('cruds.price.fields.price_sell') }}</label>
                            <input class="form-control" type="number" name="price_sell" id="price_sell" value="{{ old('price_sell', '') }}" step="0.01" required>
                            @if($errors->has('price_sell'))
                                <span class="help-block" role="alert">{{ $errors->first('price_sell') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.price.fields.price_sell_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('users') ? 'has-error' : '' }}">
                            <label class="required" for="users_id">{{ trans('cruds.price.fields.users') }}</label>
                            <select class="form-control select2" name="users_id" id="users_id" required>
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ old('users_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('users'))
                                <span class="help-block" role="alert">{{ $errors->first('users') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.price.fields.users_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.price.fields.status') }}</label>
                            <select class="form-control" name="status" id="status">
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Price::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '1') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.price.fields.status_helper') }}</span>
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