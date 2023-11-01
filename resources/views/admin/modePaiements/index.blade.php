@extends('layouts.admin')
@section('content')
<div class="content">
    @can('mode_paiement_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.mode-paiements.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.modePaiement.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.modePaiement.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ModePaiement">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.country') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.slog') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.libelle') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.logos') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.api_key') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.site_token') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.notify_url') }}
                                </th>
                                <th>
                                    {{ trans('cruds.modePaiement.fields.return_url') }}
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
@can('mode_paiement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.mode-paiements.massDestroy') }}",
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
    ajax: "{{ route('admin.mode-paiements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'country', name: 'countries.name' },
{ data: 'slog', name: 'slog' },
{ data: 'libelle', name: 'libelle' },
{ data: 'logos', name: 'logos', sortable: false, searchable: false },
{ data: 'status', name: 'status' },
{ data: 'api_key', name: 'api_key' },
{ data: 'site_token', name: 'site_token' },
{ data: 'notify_url', name: 'notify_url' },
{ data: 'return_url', name: 'return_url' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  };
  let table = $('.datatable-ModePaiement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection