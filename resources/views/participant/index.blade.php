@extends('layouts.app')

@section('template_title')
    Participant
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Participant') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('participants.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Participant Type Id</th>
										<th>Participant Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $participant)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $participant->proposal_id }}</td>
											<td>{{ $participant->participant_type_id }}</td>
											<td>{{ $participant->participant_total }}</td>

                                            <td>
                                                <form action="{{ route('participants.destroy',$participant->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('participants.show',$participant->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('participants.edit',$participant->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $participants->links() !!}
            </div>
        </div>
    </div>
@endsection
