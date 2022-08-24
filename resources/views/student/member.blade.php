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

                            <div class="float-right">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#studentModal"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nama</th>
                                        <th>Tipe Akses</th>
                                        <th>Hak Akses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
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
                                                            @if ($cekRoles = '["KETUA_HIMATIK"]')
                                                                <option value="ANGGOTA_HIMATIK">ANGGOTA_HIMATIK</option>
                                                                <option value="PANITIA_HIMATIK">PANITIA_HIMATIK</option>
                                                            @elseif ($cekRoles = '["KETUA_HIMAADBIS"]')
                                                                <option value="ANGGOTA_HIMAADBIS">ANGGOTA_HIMAADBIS</option>
                                                                <option value="PANITIA_HIMAADBIS">PANITIA_HIMAADBIS</option>
                                                            @elseif ($cekRoles = '["KETUA_HIMAKOMPAK"]')
                                                                <option value="ANGGOTA_HIMAKOMPAK">ANGGOTA_HIMAKOMPAK
                                                                </option>
                                                                <option value="PANITIA_HIMAKOMPAK">PANITIA_HIMAKOMPAK
                                                                </option>
                                                            @elseif ($cekRoles = '["KETUA_KSM"]')
                                                                <option value="ANGGOTA_KSM">ANGGOTA_KSM</option>
                                                                <option value="PANITIA_KSM">PANITIA_KSM</option>
                                                            @elseif ($cekRoles = '["KETUA_UKM"]')
                                                                <option value="ANGGOTA_UKM">ANGGOTA_UKM</option>
                                                                <option value="PANITIA_UKM">PANITIA_UKM</option>
                                                            @elseif ($cekRoles = '["KETUA_BPM"]')
                                                                <option value="ANGGOTA_BEM">ANGGOTA_BEM</option>
                                                                <option value="PANITIA_BEM">PANITIA_BEM</option>
                                                            @elseif ($cekRoles = '["KETUA_BEM"]')
                                                                <option value="ANGGOTA_BPM">ANGGOTA_BPM</option>
                                                                <option value="PANITIA_BPM">PANITIA_BPM</option>
                                                            @else
                                                                <option value="ANGGOTA_HIMATIK">ANGGOTA_HIMATIK</option>
                                                                <option value="PANITIA_HIMATIK">PANITIA_HIMATIK</option>
                                                                <option value="ANGGOTA_HIMAADBIS">ANGGOTA_HIMAADBIS</option>
                                                                <option value="PANITIA_HIMAADBIS">PANITIA_HIMAADBIS</option>
                                                                <option value="ANGGOTA_HIMAKOMPAK">ANGGOTA_HIMAKOMPAK
                                                                </option>
                                                                <option value="PANITIA_HIMAKOMPAK">PANITIA_HIMAKOMPAK
                                                                </option>
                                                                <option value="ANGGOTA_KSM">ANGGOTA_KSM</option>
                                                                <option value="PANITIA_KSM">PANITIA_KSM</option>
                                                                <option value="ANGGOTA_UKM">ANGGOTA_UKM</option>
                                                                <option value="PANITIA_UKM">PANITIA_UKM</option>
                                                                <option value="ANGGOTA_BEM">ANGGOTA_BEM</option>
                                                                <option value="PANITIA_BEM">PANITIA_BEM</option>
                                                                <option value="ANGGOTA_BPM">ANGGOTA_BPM</option>
                                                                <option value="PANITIA_BPM">PANITIA_BPM</option>
                                                            @endif
                                                    @endforeach

                                                    </select>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.student.revoke_akses', $student->id) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $students->links() !!}
            </div>
        </div>
    </div>
@endsection
