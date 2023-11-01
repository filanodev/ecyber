@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.router.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.routers.update", [$router->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('libelle') ? 'has-error' : '' }}">
                            <label class="required" for="libelle">{{ trans('cruds.router.fields.libelle') }}</label>
                            <input class="form-control" type="text" name="libelle" id="libelle" value="{{ old('libelle', $router->libelle) }}" required>
                            @if($errors->has('libelle'))
                                <span class="help-block" role="alert">{{ $errors->first('libelle') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.libelle_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact') ? 'has-error' : '' }}">
                            <label for="contact">{{ trans('cruds.router.fields.contact') }}</label>
                            <textarea class="form-control" name="contact" id="contact">{{ old('contact', $router->contact) }}</textarea>
                            @if($errors->has('contact'))
                                <span class="help-block" role="alert">{{ $errors->first('contact') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.contact_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dns_name') ? 'has-error' : '' }}">
                            <label class="required" for="dns_name">{{ trans('cruds.router.fields.dns_name') }}</label>
                            <input class="form-control" type="text" name="dns_name" id="dns_name" value="{{ old('dns_name', $router->dns_name) }}" required>
                            @if($errors->has('dns_name'))
                                <span class="help-block" role="alert">{{ $errors->first('dns_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.dns_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active_sms') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.router.fields.active_sms') }}</label>
                            <select class="form-control" name="active_sms" id="active_sms" required>
                                <option value disabled {{ old('active_sms', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Router::ACTIVE_SMS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('active_sms', $router->active_sms) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('active_sms'))
                                <span class="help-block" role="alert">{{ $errors->first('active_sms') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.active_sms_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type_serveur') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.router.fields.type_serveur') }}</label>
                            <select class="form-control" name="type_serveur" id="type_serveur" required>
                                <option value disabled {{ old('type_serveur', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Router::TYPE_SERVEUR_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type_serveur', $router->type_serveur) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_serveur'))
                                <span class="help-block" role="alert">{{ $errors->first('type_serveur') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.type_serveur_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payement_token') ? 'has-error' : '' }}">
                            <label for="payement_token">{{ trans('cruds.router.fields.payement_token') }}</label>
                            <textarea class="form-control" name="payement_token" id="payement_token">{{ old('payement_token', $router->payement_token) }}</textarea>
                            @if($errors->has('payement_token'))
                                <span class="help-block" role="alert">{{ $errors->first('payement_token') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.payement_token_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('mode_paiement') ? 'has-error' : '' }}">
                            <label for="mode_paiement_id">{{ trans('cruds.router.fields.mode_paiement') }}</label>
                            <select class="form-control select2" name="mode_paiement_id" id="mode_paiement_id">
                                @foreach($mode_paiements as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mode_paiement_id') ? old('mode_paiement_id') : $router->mode_paiement->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode_paiement'))
                                <span class="help-block" role="alert">{{ $errors->first('mode_paiement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.mode_paiement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
                            <label for="country_id">{{ trans('cruds.router.fields.country') }}</label>
                            <select class="form-control select2" name="country_id" id="country_id">
                                @foreach($countries as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('country_id') ? old('country_id') : $router->country->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('country'))
                                <span class="help-block" role="alert">{{ $errors->first('country') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.country_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <label for="city_id">{{ trans('cruds.router.fields.city') }}</label>
                            <select class="form-control select2" name="city_id" id="city_id">
                                @foreach($cities as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('city_id') ? old('city_id') : $router->city->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('city'))
                                <span class="help-block" role="alert">{{ $errors->first('city') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.city_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('map') ? 'has-error' : '' }}">
                            <label for="map">{{ trans('cruds.router.fields.map') }}</label>
                            <input class="form-control" type="text" name="map" id="map" value="{{ old('map', $router->map) }}">
                            @if($errors->has('map'))
                                <span class="help-block" role="alert">{{ $errors->first('map') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.map_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active_pub_local') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.router.fields.active_pub_local') }}</label>
                            <select class="form-control" name="active_pub_local" id="active_pub_local">
                                <option value disabled {{ old('active_pub_local', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Router::ACTIVE_PUB_LOCAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('active_pub_local', $router->active_pub_local) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('active_pub_local'))
                                <span class="help-block" role="alert">{{ $errors->first('active_pub_local') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.active_pub_local_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active_bup_global') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.router.fields.active_bup_global') }}</label>
                            <select class="form-control" name="active_bup_global" id="active_bup_global">
                                <option value disabled {{ old('active_bup_global', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Router::ACTIVE_BUP_GLOBAL_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('active_bup_global', $router->active_bup_global) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('active_bup_global'))
                                <span class="help-block" role="alert">{{ $errors->first('active_bup_global') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.active_bup_global_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('active_vpn') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.router.fields.active_vpn') }}</label>
                            <select class="form-control" name="active_vpn" id="active_vpn">
                                <option value disabled {{ old('active_vpn', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Router::ACTIVE_VPN_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('active_vpn', $router->active_vpn) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('active_vpn'))
                                <span class="help-block" role="alert">{{ $errors->first('active_vpn') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.router.fields.active_vpn_helper') }}</span>
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