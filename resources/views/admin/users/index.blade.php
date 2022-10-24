@extends('layouts.dashboard')

@section('content')
    @can('MANAGE_MASTER_DATA')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>List Users</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.user.fields.roles') }}
                                    </th>
                                    <th>
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>
                                            {{ $user->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->email ?? '' }}
                                        </td>
                                        <td>
                                            @foreach ($user->roles()->pluck('name') as $role)
                                                <span class="badge badge-info">{{ $role }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a class="btn btn-sm btn-primary"
                                                href="{{ route('admin.users.show', $user->id) }}">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>

                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('admin.users.edit', $user->id) }}">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
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
