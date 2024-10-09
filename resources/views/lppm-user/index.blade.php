@extends('layouts.dashboard')

@section('template_title')
    Lppm User
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Lppm User') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.lppm-users.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
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
                                        
										<th>User Id</th>
										<th>Status</th>
										<th>Nidn</th>
										<th>Affiliation Id</th>
										<th>Academic Grade Id</th>
										<th>Group Of Work Id</th>
										<th>Nik</th>
										<th>Google Scholar Url</th>
										<th>Scopus Id</th>
										<th>Department Id</th>
										<th>Handphone</th>
										<th>Place Of Birth</th>
										<th>Date Of Birth</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lppmUsers as $lppmUser)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lppmUser->user_id }}</td>
											<td>{{ $lppmUser->status }}</td>
											<td>{{ $lppmUser->nidn }}</td>
											<td>{{ $lppmUser->affiliation_id }}</td>
											<td>{{ $lppmUser->academic_grade_id }}</td>
											<td>{{ $lppmUser->group_of_work_id }}</td>
											<td>{{ $lppmUser->nik }}</td>
											<td>{{ $lppmUser->google_scholar_url }}</td>
											<td>{{ $lppmUser->scopus_id }}</td>
											<td>{{ $lppmUser->department_id }}</td>
											<td>{{ $lppmUser->handphone }}</td>
											<td>{{ $lppmUser->place_of_birth }}</td>
											<td>{{ $lppmUser->date_of_birth }}</td>

                                            <td>
                                                <form action="{{ route('admin.lppm-users.destroy',$lppmUser->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.lppm-users.show',$lppmUser->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.lppm-users.edit',$lppmUser->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $lppmUsers->links() !!}
            </div>
        </div>
    </div>
@endsection
