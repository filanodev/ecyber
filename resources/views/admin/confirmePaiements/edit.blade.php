@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.confirmePaiement.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.confirme-paiements.update", [$confirmePaiement->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('mode_paiement') ? 'has-error' : '' }}">
                            <label for="mode_paiement_id">{{ trans('cruds.confirmePaiement.fields.mode_paiement') }}</label>
                            <select class="form-control select2" name="mode_paiement_id" id="mode_paiement_id">
                                @foreach($mode_paiements as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('mode_paiement_id') ? old('mode_paiement_id') : $confirmePaiement->mode_paiement->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mode_paiement'))
                                <span class="help-block" role="alert">{{ $errors->first('mode_paiement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.mode_paiement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('payement_ref') ? 'has-error' : '' }}">
                            <label for="payement_ref">{{ trans('cruds.confirmePaiement.fields.payement_ref') }}</label>
                            <input class="form-control" type="text" name="payement_ref" id="payement_ref" value="{{ old('payement_ref', $confirmePaiement->payement_ref) }}">
                            @if($errors->has('payement_ref'))
                                <span class="help-block" role="alert">{{ $errors->first('payement_ref') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.payement_ref_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('identifiant') ? 'has-error' : '' }}">
                            <label for="identifiant">{{ trans('cruds.confirmePaiement.fields.identifiant') }}</label>
                            <input class="form-control" type="text" name="identifiant" id="identifiant" value="{{ old('identifiant', $confirmePaiement->identifiant) }}">
                            @if($errors->has('identifiant'))
                                <span class="help-block" role="alert">{{ $errors->first('identifiant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.identifiant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('montant') ? 'has-error' : '' }}">
                            <label for="montant">{{ trans('cruds.confirmePaiement.fields.montant') }}</label>
                            <input class="form-control" type="number" name="montant" id="montant" value="{{ old('montant', $confirmePaiement->montant) }}" step="0.01">
                            @if($errors->has('montant'))
                                <span class="help-block" role="alert">{{ $errors->first('montant') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.montant_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('compte_payement') ? 'has-error' : '' }}">
                            <label for="compte_payement">{{ trans('cruds.confirmePaiement.fields.compte_payement') }}</label>
                            <input class="form-control" type="text" name="compte_payement" id="compte_payement" value="{{ old('compte_payement', $confirmePaiement->compte_payement) }}">
                            @if($errors->has('compte_payement'))
                                <span class="help-block" role="alert">{{ $errors->first('compte_payement') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.compte_payement_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('datetime') ? 'has-error' : '' }}">
                            <label for="datetime">{{ trans('cruds.confirmePaiement.fields.datetime') }}</label>
                            <input class="form-control" type="text" name="datetime" id="datetime" value="{{ old('datetime', $confirmePaiement->datetime) }}">
                            @if($errors->has('datetime'))
                                <span class="help-block" role="alert">{{ $errors->first('datetime') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.datetime_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.confirmePaiement.fields.status') }}</label>
                            <input class="form-control" type="number" name="status" id="status" value="{{ old('status', $confirmePaiement->status) }}" step="1">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('commentaire') ? 'has-error' : '' }}">
                            <label for="commentaire">{{ trans('cruds.confirmePaiement.fields.commentaire') }}</label>
                            <textarea class="form-control" name="commentaire" id="commentaire">{{ old('commentaire', $confirmePaiement->commentaire) }}</textarea>
                            @if($errors->has('commentaire'))
                                <span class="help-block" role="alert">{{ $errors->first('commentaire') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.confirmePaiement.fields.commentaire_helper') }}</span>
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