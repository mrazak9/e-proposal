@extends('layouts.dashboard')

@section('template_title')
    Dokumentasi Kegiatan
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <section class="jumbotron text-center">
                <div class="container">
                    <h1 class="jumbotron-heading">Dokumentasi Kegiatan Kemahasiswaan</h1>
                    <p class="lead text-muted">
                        Berisi link lampiran kegiatan berupa foto/video dan lampiran kwitansi/bukti pembayaran setiap
                        kegiatan kemahasiswaan.
                    </p>
                </div>
            </section>
        </div>
    </div>

    <div class="card my-3">
        <div class="card-body">
            <div class="album">
                <div class="container">
                    <div class="row">
                        @foreach ($documentations as $documentation)
                            <div class="col-md-3">
                                <div class="card mb-4 box-shadow">
                                    <img class="card-img-top"
                                        src="https://img.freepik.com/free-vector/workers-organizing-data-storage-flat-vector-illustration-women-putting-folders-cabinet-man-searching-document-folder-organized-archive-database-information-concept_74855-23412.jpg?w=996&t=st=1686197102~exp=1686197702~hmac=5c12f4c4b49225d25b060c982cdd26dd6fa0f5640134a8f2786ec5f3f5648f9a"
                                        alt="Card image cap">
                                    <div class="card-body">
                                        <p class="card-title fw-bold">
                                            {{ $loop->iteration }}. {{ $documentation->proposal->org_name }}
                                        </p>
                                        <p class="card-text">
                                            {{ $documentation->proposal->name }}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{ $documentation->link_dokumentasi_kegiatan }}"
                                                    class="btn btn-sm btn-outline-info" target="_blank">
                                                    <i class="fas fa-film"></i>
                                                </a>
                                                <a href="{{ $documentation->link_lampiran }}"
                                                    class="btn btn-sm btn-outline-success" target="_blank">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar"></i>
                                            {{ $documentation->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {!! $documentations->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
