@extends('layouts.app')

@section('template_title')
    Committee
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Committee') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('committees.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Position</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committees as $committee)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $committee->proposal_id }}</td>
											<td>{{ $committee->user_id }}</td>
											<td>{{ $committee->position }}</td>

                                            <td>
                                                <form action="{{ route('committees.destroy',$committee->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('committees.show',$committee->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('committees.edit',$committee->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $committees->links() !!}
            </div>
        </div>
    </div>
@endsection
