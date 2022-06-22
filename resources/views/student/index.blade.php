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
                                {{ __('Student') }}
                            </span>

                             <div class="float-right">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#studentModal">Create</button>
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
                                        
										<th>User Id</th>
										<th>Nim</th>
										<th>Prodi</th>
										<th>Kelas</th>
										<th>Organization Id</th>
										<th>Position</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $student->user_id }}</td>
											<td>{{ $student->nim }}</td>
											<td>{{ $student->prodi }}</td>
											<td>{{ $student->kelas }}</td>
											<td>{{ $student->organization_id }}</td>
											<td>{{ $student->position }}</td>

                                            <td>
                                                <form action="{{ route('admin.students.destroy',$student->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.students.show',$student->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.students.edit',$student->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
