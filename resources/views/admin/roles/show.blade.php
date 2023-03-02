@extends('layouts.dashboard')
@section('template_title')
    Show Roles
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>Show Roles</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <th>
                                    {{ trans('cruds.role.fields.id') }}
                                </th>
                                <td>
                                    {{ $role->id }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    {{ trans('cruds.role.fields.title') }}
                                </th>
                                <td>
                                    {{ $role->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Permissions
                                </th>
                                <td>
                                    @foreach ($role->permissions()->pluck('name') as $permission)
                                        <span class="label label-info label-many">{{ $permission }}</span>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <nav class="mb-3">
                    <div class="nav nav-tabs">

                    </div>
                </nav>
                <div class="tab-content">

                </div>
            </div>
            <a style="margin-top:20px;" class="btn btn-info" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
    </div>
@endsection
