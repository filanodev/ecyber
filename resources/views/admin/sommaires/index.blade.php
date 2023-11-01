@extends('layouts.admin')
@section('content')
<div class="content">
    @can('sommaire_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sommaires.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.sommaire.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.sommaire.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Sommaire">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.identifiant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.montant') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.montant_payer') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.type_payement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.ask_payement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.confirm_payement') }}
                                </th>
                                <th>
                                    {{ trans('cruds.sommaire.fields.commentaire') }}
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
    ajax: "{{ route('admin.sommaires.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'identifiant', name: 'identifiant' },
{ data: 'description', name: 'description' },
{ data: 'montant', name: 'montant' },
{ data: 'montant_payer', name: 'montant_payer' },
{ data: 'status', name: 'status' },
{ data: 'type_payement', name: 'type_payement' },
{ data: 'ask_payement', name: 'ask_payement' },
{ data: 'confirm_payement', name: 'confirm_payement' },
{ data: 'commentaire', name: 'commentaire' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 50,
  };
  let table = $('.datatable-Sommaire').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection