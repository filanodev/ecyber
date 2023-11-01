@extends('layouts.admin')
@section('content')
<div class="content">
    @can('confirme_paiement_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.confirme-paiements.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.confirmePaiement.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.confirmePaiement.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-ConfirmePaiement">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.mode_paiement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.payement_ref') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.identifiant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.montant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.compte_payement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.datetime') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.confirmePaiement.fields.commentaire') }}
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
@can('confirme_paiement_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.confirme-paiements.massDestroy') }}",
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
    ajax: "{{ route('admin.confirme-paiements.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'mode_paiement_libelle', name: 'mode_paiement.libelle' },
{ data: 'payement_ref', name: 'payement_ref' },
{ data: 'identifiant', name: 'identifiant' },
{ data: 'montant', name: 'montant' },
{ data: 'compte_payement', name: 'compte_payement' },
{ data: 'datetime', name: 'datetime' },
{ data: 'status', name: 'status' },
{ data: 'commentaire', name: 'commentaire' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-ConfirmePaiement').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection