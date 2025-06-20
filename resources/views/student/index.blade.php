@extends('layouts.dashboard')

@section('template_title')
    Student
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>{{ __('Student') }}</h3>

                            </span>

                            <div class="float-right">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#studentModal"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <form method="GET" action="{{ route('admin.student.search') }}">
                        <div class="input-group" style="padding: 1em">
                            <input type="text" name="search" class="form-control" placeholder="Cari nama Mahasiswa"
                                value="{{ request('search') }}">
                            <button type="submit" class="btn"><i class="fas fa-search text-primary"></i></button>
                        </div>
                    </form>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @include('student.modal')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nama</th>
                                        <th>Nim</th>
                                        <th>Prodi</th>
                                        <th>Kelas</th>
                                        <th>Position</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $student->name }}</td>
                                            <td>{{ $student->student->nim }}</td>
                                            <td>{{ $student->student->prodi }}</td>
                                            <td>{{ $student->student->kelas }}</td>

                                            <td>{{ $student->position }}</td>

                                            <td>
                                                <form action="{{ route('admin.students.destroy', $student->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.students.show', $student->id) }}"><i
                                                            class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.students.edit', $student->id) }}"><i
                                                            class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('{{ trans('global.areYouSure') }}');"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
