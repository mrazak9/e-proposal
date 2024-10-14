@extends('layouts.dashboard')

@section('template_title')
    Profil Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4><i class="fas fa-user-circle text-info"></i> Profil Saya</h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col md-6">
                                <p>
                                    <strong>Nama Lengkap (tanpa gelar):</strong>
                                    {{ Auth::user()->name }} <br>
                                    <strong>NIK:</strong>
                                    {{ $profile->nik }}<br>
                                    <strong>Tempat dan Tanggal Lahir:</strong>
                                    {{ $profile->place_of_birth }}/{{ $profile->date_of_birth }}<br>
                                    <strong>Nomor Handphone:</strong>
                                    {{ $profile->handphone }}<br>
                                    <strong>Alamat Email:</strong>
                                    {{ Auth::user()->email }}<br>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p>
                                    <strong>NIDN/NIDK/ NIP:</strong>
                                    {{ $profile->nidn }}<br>
                                    <strong>Status:</strong>
                                    @if ($profile->status == 1)
                                        Dosen Tetap
                                    @else
                                        Dosen LB
                                    @endif
                                    <br>
                                    <strong>Afiliasi/Institusi:</strong>
                                    {{ $profile->affiliation }}<br>
                                    <strong>Jabatan Fungsional:</strong>
                                    @switch($profile->academic_grade_id)
                                        @case(1)
                                            Tenaga Pengajar
                                        @break

                                        @case(2)
                                            Asisten Ahli
                                        @break

                                        @case(3)
                                            Lektor
                                        @break

                                        @case(4)
                                            Lektor Kepala
                                        @break

                                        @case(5)
                                            Guru Besar
                                        @break

                                        @default
                                    @endswitch
                                    <br>
                                    <strong>Golongan:</strong>
                                    @switch($profile->group_of_work_id)
                                        @case(1)
                                            IIIa
                                        @break

                                        @case(2)
                                            IIIb
                                        @break

                                        @case(3)
                                            IIIc
                                        @break

                                        @case(4)
                                            IIId
                                        @break

                                        @case(5)
                                            IVa
                                        @break

                                        @case(6)
                                            IVb
                                        @break

                                        @case(7)
                                            IVc
                                        @break

                                        @case(8)
                                            IVd
                                        @break

                                        @default
                                    @endswitch
                                    <br>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col md-6">
                                <p>
                                    <strong>Departemen:</strong>
                                    @switch($profile->department_id)
                                        @case(1)
                                            Program Studi SI
                                        @break

                                        @case(2)
                                            Program Studi IF
                                        @break

                                        @case(3)
                                            Program Studi KA
                                        @break

                                        @case(4)
                                            Program Studi AB
                                        @break

                                        @default
                                    @endswitch <br>
                                    <strong>Google Scholar URL:</strong>
                                    {{ $profile->google_scholar_url }} <br>
                                    <strong>Scopus ID:</strong>
                                    {{ $profile->scopus_id ?? 'not set' }} <br>
                                </p>
                            </div>
                            <div class="col-md-12">
                                <hr>
                                <button class="w-100 btn btn-warning">
                                    <i class="fas fa-pencil-alt"></i> Update Profil
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
