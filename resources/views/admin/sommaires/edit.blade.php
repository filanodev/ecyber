@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.sommaire.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sommaires.update", [$sommaire->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('identifiant') ? 'has-error' : '' }}">
                            <label for="identifiant">{{ trans('cruds.sommaire.fields.identifiant') }}</label>
                            <input class="form-control" type="text" name="identifiant" id="identifiant" value="{{ old('identifiant', $sommaire->identifiant) }}">
                            @if($errors->has('identifiant'))
                                <span class="help-block" role="alert">{{ $errors->first('identifiant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.identifiant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.sommaire.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $sommaire->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('montant') ? 'has-error' : '' }}">
                            <label for="montant">{{ trans('cruds.sommaire.fields.montant') }}</label>
                            <input class="form-control" type="number" name="montant" id="montant" value="{{ old('montant', $sommaire->montant) }}" step="0.01">
                            @if($errors->has('montant'))
                                <span class="help-block" role="alert">{{ $errors->first('montant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.montant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('montant_payer') ? 'has-error' : '' }}">
                            <label for="montant_payer">{{ trans('cruds.sommaire.fields.montant_payer') }}</label>
                            <input class="form-control" type="number" name="montant_payer" id="montant_payer" value="{{ old('montant_payer', $sommaire->montant_payer) }}" step="0.01">
                            @if($errors->has('montant_payer'))
                                <span class="help-block" role="alert">{{ $errors->first('montant_payer') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.montant_payer_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.sommaire.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', $sommaire->status) }}" step="1">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type_payement') ? 'has-error' : '' }}">
                            <label class="required" for="type_payement">{{ trans('cruds.sommaire.fields.type_payement') }}</label>
                            <input class="form-control" type="number" name="type_payement" id="type_payement" value="{{ old('type_payement', $sommaire->type_payement) }}" step="1" required>
                            @if($errors->has('type_payement'))
                                <span class="help-block" role="alert">{{ $errors->first('type_payement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.type_payement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ask_payement') ? 'has-error' : '' }}">
                            <label for="ask_payement">{{ trans('cruds.sommaire.fields.ask_payement') }}</label>
                            <input class="form-control" type="text" name="ask_payement" id="ask_payement" value="{{ old('ask_payement', $sommaire->ask_payement) }}">
                            @if($errors->has('ask_payement'))
                                <span class="help-block" role="alert">{{ $errors->first('ask_payement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.ask_payement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('confirm_payement') ? 'has-error' : '' }}">
                            <label for="confirm_payement">{{ trans('cruds.sommaire.fields.confirm_payement') }}</label>
                            <input class="form-control" type="text" name="confirm_payement" id="confirm_payement" value="{{ old('confirm_payement', $sommaire->confirm_payement) }}">
                            @if($errors->has('confirm_payement'))
                                <span class="help-block" role="alert">{{ $errors->first('confirm_payement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.confirm_payement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('commentaire') ? 'has-error' : '' }}">
                            <label for="commentaire">{{ trans('cruds.sommaire.fields.commentaire') }}</label>
                            <textarea class="form-control" name="commentaire" id="commentaire">{{ old('commentaire', $sommaire->commentaire) }}</textarea>
                            @if($errors->has('commentaire'))
                                <span class="help-block" role="alert">{{ $errors->first('commentaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.sommaire.fields.commentaire_helper') }}</span>
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