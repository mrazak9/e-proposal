@extends('layouts.dashboard')

@section('template_title')
    Update Dop
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Dop</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.dops.update', $dop->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dop.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
