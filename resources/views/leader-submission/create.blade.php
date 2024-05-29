@extends('layouts.dashboard')

@section('template_title')
    Pengajuan Ketua Organisasi
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><i class="fas fa-user-tie"></i> Pengajuan Ketua Organisasi</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info text-light" role="alert">
                                    <strong>Harap diperhatikan!</strong> Setelah melakukan pengajuan, silahkan menunggu
                                    untuk beberapa saat. Dan cek kembali
                                </div>
                            </div>
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('admin.leader-submissions.store') }}" role="form"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ Auth::User()->id }}" required>
                                    <label class="form-label"><i class="fas fa-backward"></i> Ketua Sebelumnya</label>
                                    <select class="form-control" name="previous_leader_id" required>
                                        <option selected disabled>== Silahkan Pilih ==</option>
                                        @foreach ($previousLeader as $value => $key)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100"
                                    onclick="return confirm('Apakah sudah benar?');">
                                    <i class="fas fa-check-circle"></i> Submit
                                </button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
