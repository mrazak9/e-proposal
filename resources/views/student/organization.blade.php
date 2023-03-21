@extends('layouts.dashboard')

@section('template_title')
    Student with Organization
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                @php
                                    $now = date('Y');
                                    $lastyear = date('Y') - 1;
                                @endphp
                                @foreach ($organizations as $orgname)
                                    <h3 class="text-center">Kepengurusan Aktif - {{ $orgname->name }}</h3>
                                @endforeach

                                <h4>
                                    {{ $lastyear }}/{{ $now }}
                                </h4>
                            </span>
                        </div>
                    </div>
                    {{-- <form method="GET" action="{{ route('admin.student.search') }}">
                        <div class="input-group" style="padding: 1em">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama Mahasiswa"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn"><i class="fas fa-search text-primary"></i></button>
                        </div>
                    </form> --}}

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="alert alert-info alert-dismissible fade show text-white" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                                <strong>
                                    <a class="link text-white" href="{{ route('admin.student.member') }}">
                                        Klik ini
                                    </a>
                                </strong> Untuk set anggota aktif atau hapus anggota
                            </div>
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th><i class="fas fa-user-check"></i> Nama Mahasiswa dan Peran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $org)
                                        <tr class="align-middle">
                                            <td>
                                                @foreach ($org->student->sortBy('user.name') as $studentmember)
                                                    {{ ++$i }}. <strong>{{ $studentmember->user->name }}</strong>
                                                    <i>sebagai</i>
                                                    @foreach ($studentmember->user->roles as $role)
                                                        <strong>{{ $role->name }}</strong> <br>
                                                    @endforeach
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $organizations->links() !!}
                </div>

            </div>
        </div>
    </div>
@endsection
