@extends('layouts.dashboard')

@section('template_title')
    Tambah Laporan Lembar Pertanggung Jawaban
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <h3>Tambah Laporan</h3>
                        <h4>Lembar Pertanggung Jawaban</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.lpj.post') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="owner" value="{{ $cekOwner->owner }}">
                            @include('lpj.form.finalize')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
