@extends('layouts.dashboard')
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.permissions.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>List Permissions</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Permission">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.permission.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.permission.fields.title') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permissions as $key => $permission)
                                    <tr data-entry-id="{{ $permission->id }}">
                                        <td>
                                            {{ $permission->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $permission->name ?? '' }}
                                        </td>
                                        <td>
                                            <a class="btn btn-xs btn-primary"
                                                href="{{ route('admin.permissions.show', $permission->id) }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a class="btn btn-xs btn-info"
                                                href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        @parent
        <script>
            $(function() {
                let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.permissions.mass_destroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)

                $.extend(true, $.fn.dataTable.defaults, {
                    order: [
                        [1, 'desc']
                    ],
                    pageLength: 100,
                });
                $('.datatable-Permission:not(.ajaxTable)').DataTable({
                    buttons: dtButtons
                })
                $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                    $($.fn.dataTable.tables(true)).DataTable()
                        .columns.adjust();
                });
            })
        </script>
    @endsection
