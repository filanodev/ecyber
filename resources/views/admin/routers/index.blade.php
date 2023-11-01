@extends('layouts.admin')
@section('content')
<div class="content">
    @can('router_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.routers.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.router.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Router', 'route' => 'admin.routers.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.router.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Router">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.libelle') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.contact') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.dns_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.active_sms') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.type_serveur') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.payement_token') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.mode_paiement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.country') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.city') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.map') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.active_pub_local') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.active_bup_global') }}
                                </th>
                                <th>
                                    {{ trans('cruds.router.fields.active_vpn') }}
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
@can('router_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.routers.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.routers.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'libelle', name: 'libelle' },
{ data: 'contact', name: 'contact' },
{ data: 'dns_name', name: 'dns_name' },
{ data: 'active_sms', name: 'active_sms' },
{ data: 'type_serveur', name: 'type_serveur' },
{ data: 'payement_token', name: 'payement_token' },
{ data: 'mode_paiement_libelle', name: 'mode_paiement.libelle' },
{ data: 'country_name', name: 'country.name' },
{ data: 'city_name', name: 'city.name' },
{ data: 'map', name: 'map' },
{ data: 'active_pub_local', name: 'active_pub_local' },
{ data: 'active_bup_global', name: 'active_bup_global' },
{ data: 'active_vpn', name: 'active_vpn' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-Router').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection