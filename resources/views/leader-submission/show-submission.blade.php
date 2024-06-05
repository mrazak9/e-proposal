@extends('layouts.dashboard')

@section('template_title')
    Pengajuan Ketua
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <h3>Daftar Pengajuan Ketua</h3>
                </div>
                <div class="alert alert-info text-light" role="alert">
                    <strong>
                        <i class="fa fa-info-circle" aria-hidden="true"></i> Perhatian
                    </strong> <br>
                    Klik/tekan tombol <i class="fas fa-check-circle text-success"></i> untuk melakukan penetapan Ketua
                    Organisasi
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Pengajuan Ketua Sekarang</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-secondary table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ketua Sebelumnya</th>
                                        <th>Ketua Sebelumnya</th>
                                        <th>Organisasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($leaderSubmissions as $submission)
                                        <tr>
                                            <td>
                                                {{ ++$i }}
                                            </td>
                                            <td>
                                                {{ $submission->userLeader->name }}
                                            </td>
                                            <td>
                                                {{ $submission->user->name }}
                                            </td>
                                            <td>
                                                {{ $submission->user->student->organization->name }}
                                            </td>
                                            <td>
                                                <a class="btn btn-success w-100" href="#" target="_blank">
                                                    <i class="fas fa-check-circle"></i> Setujui
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12">
                        <h4>Ketua yang telah Ditetapkan</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-success table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Ketua</th>
                                        <th>Organisasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>R1C1</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                        <td>R1C2</td>
                                        <td>R1C3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
