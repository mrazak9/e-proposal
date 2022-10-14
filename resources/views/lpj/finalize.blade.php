@extends('layouts.dashboard')

@section('template_title')
    Finalize Lembar Pertanggung Jawaban
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Finalize</h3>
                        <h4>Lembar Pertanggung Jawaban</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('lpj.form.finalize')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
