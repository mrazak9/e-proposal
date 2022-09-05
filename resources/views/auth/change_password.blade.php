@extends('layouts.dashboard')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-header p-3 pt-2">
                    <h3>Change Password</h3>
                </div>
                <hr class="dark horizontal my-0">
                <div class="card-footer p-3">
                    <form action="{{ route('auth.change_password') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group {{ $errors->has('current_password') ? 'has-error' : '' }}">
                            <label for="current_password">Current password *</label>
                            <input type="password" id="current_password" name="current_password" class="form-control"
                                required>
                            @if ($errors->has('current_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('current_password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('new_password') ? 'has-error' : '' }}">
                            <label for="new_password">New password *</label>
                            <input type="password" id="new_password" name="new_password" class="form-control" required>
                            @if ($errors->has('new_password'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password') }}
                                </em>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('new_password_confirmation') ? 'has-error' : '' }}">
                            <label for="new_password_confirmation">New password confirmation *</label>
                            <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                                class="form-control" required>
                            @if ($errors->has('new_password_confirmation'))
                                <em class="invalid-feedback">
                                    {{ $errors->first('new_password_confirmation') }}
                                </em>
                            @endif
                        </div>



                </div>



            </div>
            <br />
            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </form>
        </div>
    </div>
@endsection
