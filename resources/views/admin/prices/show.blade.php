@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.price.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.prices.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $price->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.router') }}
                                    </th>
                                    <td>
                                        {{ $price->router->libelle ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.libelle') }}
                                    </th>
                                    <td>
                                        {{ $price->libelle }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.price_sell') }}
                                    </th>
                                    <td>
                                        {{ $price->price_sell }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.users') }}
                                    </th>
                                    <td>
                                        {{ $price->users->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.price.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Price::STATUS_SELECT[$price->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.prices.index') }}">
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