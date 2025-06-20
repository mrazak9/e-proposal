@extends('layouts.dashboard')
@section('template_title')
    Create Roles
@endsection
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>Add Roles</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <form action="{{ route('admin.roles.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.role.fields.title') }}*</label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', isset($role) ? $role->name : '') }}" required>
                            @if ($errors->has('name'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('name') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.title_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('permissions') ? 'has-error' : '' }}">
                            <label for="permission">{{ trans('cruds.role.fields.permissions') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span
                                    class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="permission[]" id="permission" class="form-control select2" multiple="multiple"
                                required style="height: 400px">
                                @foreach ($permissions as $id => $permissions)
                                    <option value="{{ $id }}"
                                        {{ in_array($id, old('permission', [])) || (isset($role) && $role->permissions->contains($id)) ? 'selected' : '' }}>
                                        {{ $permissions }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('permission'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('permission') }}
                                </em>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.role.fields.permissions_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
