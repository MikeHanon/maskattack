@extends('layouts.admin')
@section('content')
@can('meta_user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.meta-users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.metaUser.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.metaUser.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-MetaUser">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.user_id') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.First_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.Last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.adresse') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.acount_nbr') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.phone_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.paypal') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.created_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.updated_at') }}
                        </th>
                        <th>
                            {{ trans('cruds.metaUser.fields.deleted_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($metaUsers as $key => $metaUser)
                        <tr data-entry-id="{{ $metaUser->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $metaUser->id ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->user_id ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->First_name ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->Last_name ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->adresse ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->acount_nbr ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->phone_number ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->paypal ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->created_at ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->updated_at ?? '' }}
                            </td>
                            <td>
                                {{ $metaUser->deleted_at ?? '' }}
                            </td>
                            <td>
                                @can('meta_user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.meta-users.show', $metaUser->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('meta_user_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.meta-users.edit', $metaUser->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('meta_user_delete')
                                    <form action="{{ route('admin.meta-users.destroy', $metaUser->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('meta_user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.meta-users.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-MetaUser:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
