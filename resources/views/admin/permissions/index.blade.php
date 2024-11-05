@extends('layouts.dashboard')
@section('template_title')
    List Permissions
@endsection
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
                        <table id="datatable" class="table table-bordered table-striped table-hover">
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
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.permissions.show', $permission->id) }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('admin.permissions.edit', $permission->id) }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="bi bi-trash-fill"></i></button>
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
        <script>
            $(document).ready(function() {
                // Inisialisasi DataTables
                $('#datatable').DataTable({

                });
            });
        </script>
    @endsection
