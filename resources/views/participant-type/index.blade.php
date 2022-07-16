@extends('layouts.dashboard')

@section('template_title')
    Participant Type
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Participant Type') }}
                            </span>

                             <div class="float-right">
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#participantTypeModal">Create</button>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        @include('participant-type.modal')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Notes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participantTypes as $participantType)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $participantType->name }}</td>
											<td>{{ $participantType->notes }}</td>

                                            <td>
                                                <form action="{{ route('admin.participant_type.destroy',$participantType->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.participant_type.show',$participantType->id) }}"><i class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.participant_type.edit',$participantType->id) }}"><i class="bi bi-pencil"></i></a>
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
                {!! $participantTypes->links() !!}
            </div>
        </div>
    </div>
@endsection
