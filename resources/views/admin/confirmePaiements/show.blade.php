@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.confirmePaiement.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.confirme-paiements.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.mode_paiement') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->mode_paiement->libelle ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.payement_ref') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->payement_ref }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.identifiant') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->identifiant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.montant') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->montant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.compte_payement') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->compte_payement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.datetime') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->datetime }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.confirmePaiement.fields.commentaire') }}
                                    </th>
                                    <td>
                                        {{ $confirmePaiement->commentaire }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.confirme-paiements.index') }}">
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