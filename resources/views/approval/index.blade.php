@extends('layouts.app')

@section('template_title')
    Approval
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Approval') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('approvals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proposal Id</th>
										<th>User Id</th>
										<th>Name</th>
										<th>Approved</th>
										<th>Date</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvals as $approval)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $approval->proposal_id }}</td>
											<td>{{ $approval->user_id }}</td>
											<td>{{ $approval->name }}</td>
											<td>{{ $approval->approved }}</td>
											<td>{{ $approval->date }}</td>

                                            <td>
                                                <form action="{{ route('approvals.destroy',$approval->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('approvals.show',$approval->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('approvals.edit',$approval->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $approvals->links() !!}
            </div>
        </div>
    </div>
@endsection
