@extends('layouts.dashboard')

@section('template_title')
    Update Lppm User
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Lppm User</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.lppm-users.update', $lppmUser->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('lppm-user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
