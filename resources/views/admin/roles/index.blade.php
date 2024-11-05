@extends('layouts.dashboard')
@section('template_title')
    List Roles
@endsection
@section('content')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.roles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>List Roles</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <div class="table-responsive">
                        <table id="datatable" class=" table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.role.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.role.fields.title') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.role.fields.permissions') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr data-entry-id="{{ $role->id }}">

                                        <td>
                                            {{ $role->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $role->name ?? '' }}
                                        </td>
                                        <td>
                                            @foreach ($role->permissions()->pluck('name') as $permission)
                                                <span class="badge badge-info">{{ $permission }}</span><br />
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.roles.show', $role->id) }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('admin.roles.edit', $role->id) }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST"
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
