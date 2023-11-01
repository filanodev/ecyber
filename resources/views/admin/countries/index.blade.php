@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.country.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Country">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.code') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.phonecode') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.currency') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.taux') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.timezones') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.latitude') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.longitude') }}
                                </th>
                                <th>
                                    {{ trans('cruds.country.fields.status') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.countries.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'code', name: 'code' },
{ data: 'name', name: 'name' },
{ data: 'phonecode', name: 'phonecode' },
{ data: 'currency', name: 'currency' },
{ data: 'taux', name: 'taux' },
{ data: 'timezones', name: 'timezones' },
{ data: 'latitude', name: 'latitude' },
{ data: 'longitude', name: 'longitude' },
{ data: 'status', name: 'status' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 3, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Country').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection