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
                        <h4>Pengajuan Ketua</h4>
                        <div class="table-responsive">
                            <table class="table table-striped table-secondary table-sm">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Ketua Sebelumnya</th>
                                        <th>Ketua Sekarang</th>
                                        <th>Organisasi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($leaderSubmissions as $submission)
                                        <tr valign="middle">
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
                                                <form action="{{ route('admin.leader-submissions.set-leader') }}"
                                                    method="POST">
                                                    @php
                                                        $position = $submission->user->getRoleNames();
                                                    @endphp
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $submission->id }}">
                                                    @switch($position)
                                                        @case('["ANGGOTA_BEM"]')
                                                            <input type="hidden" name="position" value="KETUA_BEM">
                                                        @break

                                                        @case('["ANGGOTA_BPM"]')
                                                            <input type="hidden" name="position" value="KETUA_BPM">
                                                        @break

                                                        @case('["ANGGOTA_HIMAADBIS"]')
                                                            <input type="hidden" name="position" value="KETUA_HIMAADBIS">
                                                        @break

                                                        @case('["ANGGOTA_HIMAKOMPAK"]')
                                                            <input type="hidden" name="position" value="KETUA_HIMAKOMPAK">
                                                        @break

                                                        @case('["ANGGOTA_HIMASI"]')
                                                            <input type="hidden" name="position" value="KETUA_HIMASI">
                                                        @break

                                                        @case('["ANGGOTA_HIMATIK"]')
                                                            <input type="hidden" name="position" value="KETUA_HIMATIK">
                                                        @break

                                                        @case('["ANGGOTA_KSM"]')
                                                            <input type="hidden" name="position" value="KETUA_KSM">
                                                        @break

                                                        @case('["ANGGOTA_UKM"]')
                                                            <input type="hidden" name="position" value="KETUA_UKM">
                                                        @break
                                                    @endswitch

                                                    <button type="submit" class="btn btn-success w-100" onclick="return confirm('Apakah sudah benar?');">
                                                        <i class="fas fa-check-circle"></i> Setujui
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @empty
                                            <tr>
                                                <td align="center" colspan="5">
                                                    <span class="badge bg-danger text-light"><i
                                                            class="fas fa-info-circle    "></i> Tidak Ada Pengajuan Ketua</span>
                                                </td>
                                            </tr>
                                        @endforelse

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
                                            <th>Organisasi</th>
                                            <th>Jabatan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @forelse ($leaderSubmissionsApproved as $approved)
                                            <tr valign="middle">
                                                <td>
                                                    {{ ++$no }}
                                                </td>
                                                <td>
                                                    {{ $approved->user->name }}
                                                </td>
                                                <td>
                                                    {{ $approved->user->student->organization->name }}
                                                </td>
                                                <td>
                                                    {{ trim($approved->user->getRoleNames(), '[]"') }}
                                                </td>
                                                <td>
                                                    <form action="{{ route('admin.leader-submissions.revoke-leader') }}"
                                                    method="POST">
                                                    @php
                                                        $position = $approved->user->getRoleNames();
                                                    @endphp
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $approved->id }}">
                                                    @switch($position)
                                                        @case('["KETUA_BEM"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_BEM">
                                                        @break

                                                        @case('["KETUA_BPM"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_BPM">
                                                        @break

                                                        @case('["KETUA_HIMAADBIS"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_HIMAADBIS">
                                                        @break

                                                        @case('["KETUA_HIMAKOMPAK"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_HIMAKOMPAK">
                                                        @break

                                                        @case('["KETUA_HIMASI"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_HIMASI">
                                                        @break

                                                        @case('["KETUA_HIMATIK"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_HIMATIK">
                                                        @break

                                                        @case('["KETUA_KSM"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_KSM">
                                                        @break

                                                        @case('["KETUA_UKM"]')
                                                            <input type="hidden" name="position" value="ANGGOTA_UKM">
                                                        @break
                                                    @endswitch

                                                    <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Apakah sudah benar?');">
                                                        <i class="fas fa-times-circle"></i> Batalkan
                                                    </button>
                                                </form>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td align="center" colspan="5">
                                                    <span class="badge bg-danger text-light"><i
                                                            class="fas fa-info-circle    "></i> Tidak Ada Ketua</span>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
