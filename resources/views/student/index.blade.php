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
                                        <th>Organisasi</th>
                                        <th>Position</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $student->user->name }}</td>
                                            <td>{{ $student->nim }}</td>
                                            <td>{{ $student->prodi }}</td>
                                            <td>{{ $student->kelas }}</td>
                                            <td>
                                                @if ($student->organization()->exists())
                                                    {{ $student->organization->name }}
                                                @else
                                                    <span class="badge bg-warning text-white">Belum ada organisasi</span>
                                                @endif
                                            </td>
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
                </div>
                {!! $students->links() !!}
            </div>
        </div>
    </div>
@endsection
