@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.router.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.routers.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $router->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.libelle') }}
                                    </th>
                                    <td>
                                        {{ $router->libelle }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.contact') }}
                                    </th>
                                    <td>
                                        {{ $router->contact }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.dns_name') }}
                                    </th>
                                    <td>
                                        {{ $router->dns_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.active_sms') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Router::ACTIVE_SMS_SELECT[$router->active_sms] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.type_serveur') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Router::TYPE_SERVEUR_SELECT[$router->type_serveur] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.payement_token') }}
                                    </th>
                                    <td>
                                        {{ $router->payement_token }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.mode_paiement') }}
                                    </th>
                                    <td>
                                        {{ $router->mode_paiement->libelle ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.country') }}
                                    </th>
                                    <td>
                                        {{ $router->country->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.city') }}
                                    </th>
                                    <td>
                                        {{ $router->city->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.map') }}
                                    </th>
                                    <td>
                                        {{ $router->map }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.active_pub_local') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Router::ACTIVE_PUB_LOCAL_SELECT[$router->active_pub_local] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.active_bup_global') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Router::ACTIVE_BUP_GLOBAL_SELECT[$router->active_bup_global] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.router.fields.active_vpn') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Router::ACTIVE_VPN_SELECT[$router->active_vpn] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.routers.index') }}">
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