@extends('layouts.dashboard')

@section('template_title')
    Organization
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Organization') }}
                            </span>

                             <div class="float-right">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orgModal">Create</button>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        @include('organization.modal')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Singkatan</th>
										<th>Type</th>
										<th>Head Organization</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($organizations as $organization)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $organization->name }}</td>
											<td>{{ $organization->singkatan }}</td>
											<td>{{ $organization->type }}</td>
											<td>{{ $organization->head_organization }}</td>

                                            <td>
                                                <form action="{{ route('admin.organizations.destroy',$organization->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.organizations.show',$organization->id) }}"><i class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.organizations.edit',$organization->id) }}"><i class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $organizations->links() !!}
            </div>
        </div>
    </div>
@endsection
