@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.country.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $country->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $country->code }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $country->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.phonecode') }}
                                    </th>
                                    <td>
                                        {{ $country->phonecode }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.currency') }}
                                    </th>
                                    <td>
                                        {{ $country->currency }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.taux') }}
                                    </th>
                                    <td>
                                        {{ $country->taux }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.timezones') }}
                                    </th>
                                    <td>
                                        {{ $country->timezones }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.latitude') }}
                                    </th>
                                    <td>
                                        {{ $country->latitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.longitude') }}
                                    </th>
                                    <td>
                                        {{ $country->longitude }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.country.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Country::STATUS_SELECT[$country->status] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.countries.index') }}">
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