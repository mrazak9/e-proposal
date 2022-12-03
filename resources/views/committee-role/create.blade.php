@extends('layouts.dashboard')

@section('template_title')
    Create Committee Role
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Committee Role</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.committee-roles.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('committee-role.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
