@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.sommaire.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sommaires.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.identifiant') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->identifiant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.montant') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->montant }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.montant_payer') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->montant_payer }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.status') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->status }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.type_payement') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->type_payement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.ask_payement') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->ask_payement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.confirm_payement') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->confirm_payement }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.sommaire.fields.commentaire') }}
                                    </th>
                                    <td>
                                        {{ $sommaire->commentaire }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sommaires.index') }}">
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