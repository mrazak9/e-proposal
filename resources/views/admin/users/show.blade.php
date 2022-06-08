@extends('layouts.dashboard')
@section('content')
<div class="row">
    <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-header p-3 pt-2">
            <h3>Show Users</h3>
        </div>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">

            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>
                            @foreach($user->roles()->pluck('name') as $role)
                                <span class="label label-info label-many">{{ $role }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
      </div>
      <a style="margin-top:20px;" class="btn btn-info" href="{{ url()->previous() }}">
        {{ trans('global.back_to_list') }}
    </a>
    </div>
</div>
@endsection