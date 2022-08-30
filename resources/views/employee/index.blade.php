@extends('layouts.dashboard')

@section('template_title')
    Employee
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>{{ __('Employee') }}</h3>
                            </span>

                            <div class="float-right">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#employeesModal"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @include('employee.modal')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Nama</th>
                                        <th>Nip</th>
                                        <th>Department</th>
                                        <th>Position</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($employees as $employee)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $employee->user->name }}</td>
                                            <td>{{ $employee->nip }}</td>
                                            <td>{{ $employee->department }}</td>
                                            <td>{{ $employee->position }}</td>

                                            <td>
                                                <form action="{{ route('admin.employees.destroy', $employee->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.employees.show', $employee->id) }}"><i
                                                            class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.employees.edit', $employee->id) }}"><i
                                                            class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('{{ trans('global.areYouSure') }}');"><i
                                                            class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" align="middle"> <span
                                                    class="badge bg-danger text-white">Belum ada data
                                                    Karyawan</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $employees->links() !!}
            </div>
        </div>
    </div>
@endsection
