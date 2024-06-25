@extends('layouts.dashboard')

@section('template_title')
    Hak Akses Anggota
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">

                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h3>Hak Akses Anggota</h3>
                            </span>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('admin.search.member') }}">
                        <div class="input-group" style="padding: 1em">
                            <input type="text" class="form-control" name="search" value="{{ request('search') }}"
                                placeholder="Cari Nama">
                            <button type="submit" class="btn"><i class="fas fa-search text-primary"></i></button>

                        </div>
                    </form>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Tipe Akses</th>
                                        <th>Hak Akses Aplikasi</th>
                                        <th>Cabut Keanggotaan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $student->name }}</td>
                                            <td>
                                                <form action="{{ route('admin.student.update_akses') }}" method="POST">
                                                    @csrf
                                                    @php
                                                        $cekRoles = Auth::user()->getRoleNames();
                                                    @endphp
                                                    <input type="hidden" name="user_id" value="{{ $student->id }}">
                                                    @foreach ($student->roles()->pluck('name') as $role)
                                                        <span class="badge badge-info"></span>
                                                        <select class="form-control" name="position"
                                                            onchange="this.form.submit();">
                                                            <option selected disabled>{{ $role }}</option>
                                                            @hasrole('KETUA_HIMATIK')
                                                                <option value="ANGGOTA_HIMATIK">ANGGOTA_HIMATIK</option>
                                                                <option value="BENDAHARA_HIMATIK">BENDAHARA_HIMATIK</option>
                                                                <option value="PANITIA_HIMATIK">PANITIA_HIMATIK</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_HIMASI')
                                                                <option value="ANGGOTA_HIMASI">ANGGOTA_HIMASI</option>
                                                                <option value="BENDAHARA_HIMASI">BENDAHARA_HIMASI</option>
                                                                <option value="PANITIA_HIMASI">PANITIA_HIMASI</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_HIMAADBIS')
                                                                <option value="ANGGOTA_HIMAADBIS">ANGGOTA_HIMAADBIS</option>
                                                                <option value="BENDAHARA_HIMAADBIS">BENDAHARA_HIMAADBIS</option>
                                                                <option value="PANITIA_HIMAADBIS">PANITIA_HIMAADBIS</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_HIMAKOMPAK')
                                                                <option value="ANGGOTA_HIMAKOMPAK">ANGGOTA_HIMAKOMPAK
                                                                </option>
                                                                <option value="BENDAHARA_HIMAKOMPAK">BENDAHARA_HIMAKOMPAK
                                                                </option>
                                                                <option value="PANITIA_HIMAKOMPAK">PANITIA_HIMAKOMPAK
                                                                </option>
                                                            @endhasrole
                                                            @hasrole('KETUA_KSM')
                                                                <option value="ANGGOTA_KSM">ANGGOTA_KSM</option>
                                                                <option value="BENDAHARA_KSM">BENDAHARA_KSM</option>
                                                                <option value="PANITIA_KSM">PANITIA_KSM</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_UKM')
                                                                <option value="ANGGOTA_UKM">ANGGOTA_UKM</option>
                                                                <option value="BENDAHARA_UKM">BENDAHARA_UKM</option>
                                                                <option value="PANITIA_UKM">PANITIA_UKM</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_BEM')
                                                                <option value="ANGGOTA_BEM">ANGGOTA_BEM</option>
                                                                <option value="BENDAHARA_BEM">BENDAHARA_BEM</option>
                                                                <option value="PANITIA_BEM">PANITIA_BEM</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_BPM')
                                                                <option value="ANGGOTA_BPM">ANGGOTA_BPM</option>
                                                                <option value="BENDAHARA_BPM">BENDAHARA_BPM</option>
                                                                <option value="PANITIA_BPM">PANITIA_BPM</option>
                                                            @endhasrole
                                                            @hasrole('KETUA_INSTITUSI')
                                                                <option value="ANGGOTA_INSTITUSI">ANGGOTA_INSTITUSI</option>
                                                                <option value="BENDAHARA_INSTITUSI">BENDAHARA_INSTITUSI</option>
                                                                <option value="PANITIA_INSTITUSI">PANITIA_INSTITUSI</option>
                                                            @endhasrole
                                                    @endforeach

                                                    </select>
                                                </form>
                                            </td>
                                            <td align="center">
                                                @hasanyrole('ADMIN|KETUA_HIMATIK|KETUA_HIMASI|KETUA_HIMAADBIS|KETUA_HIMAKOMPAK|KETUA_UKM|KETUA_KSM|KETUA_BEM|KETUA_BPM')
                                                    <a href="{{ route('admin.student.revoke_akses', Crypt::encrypt($student->id)) }}"
                                                        class="btn btn-sm btn-warning">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                @endhasanyrole
                                            </td>
                                            <td align="center">
                                                @hasanyrole('ADMIN|KETUA_HIMATIK|KETUA_HIMASI|KETUA_HIMAADBIS|KETUA_HIMAKOMPAK|KETUA_UKM|KETUA_KSM|KETUA_BEM|KETUA_BPM')
                                                    <a href="{{ route('admin.student.revoke_akses_anggota', Crypt::encrypt($student->id)) }}"
                                                        class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Anda yakin? dengan mengklik ini. Pengguna akan dihapus dalam Database')">
                                                        <i class="fas fa-user-minus"></i>
                                                    </a>
                                                @endhasanyrole
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="middle" colspan="5"><span class="badge bg-danger text-white">Belum
                                                    ada data
                                                    Anggota</span></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $students->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
