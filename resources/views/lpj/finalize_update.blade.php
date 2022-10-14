@extends('layouts.dashboard')

@section('template_title')
    Update Laporan Lembar Pertanggung Jawaban
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Update Laporan</h3>
                        <h4>Lembar Pertanggung Jawaban</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.lpj.update') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('lpj.form.update')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
