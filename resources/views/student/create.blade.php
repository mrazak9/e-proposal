@extends('layouts.dashboard')

@section('template_title')
    Create Student
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Student</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form method="POST" action="{{ route('admin.students.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <label>NIM</label>
                                <input class="form-control" type="number" min="0" minlength="7" name="nim"
                                    required>
                                <label>Prodi</label>
                                <div class="mb-3">
                                    <select class="form-control" name="prodi" required>
                                        <option selected disabled>== Pilih Prodi ==</option>
                                        <option value="Manajemen Informatika">Manajemen Informatika</option>
                                        <option value="Administrasi Bisnis">Administrasi Bisnis</option>
                                        <option value="Komputerisasi Akuntansi">Komputerisasi Akuntansi</option>
                                    </select>
                                </div>
                                <label>Kelas</label>
                                <input class="form-control" type="text" name="kelas" required>
                                <label>Organization ID</label>
                                <div class="mb-3">
                                    <select class="form-control" name="organization_id" required>
                                        <option disabled selected>== Pilih Organisasi ==</option>
                                        @foreach ($organizations as $value => $key)
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label>Position</label>
                                <div class="mb-3">
                                    <select class="form-control" name="position" required>
                                        <option selected disabled>== Pilih Posisi ==</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Wakil Ketua">Wakil Ketua</option>
                                        <option value="Bendahara">Bendahara</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Koordinator">Koordinator</option>
                                        <option value="Anggota">Anggota</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                        
                    </div>

                   
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
