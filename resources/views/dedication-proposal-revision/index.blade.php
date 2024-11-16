@extends('layouts.app')

@section('template_title')
    Dedication Proposal Revision
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dedication Proposal Revision') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dedication-proposal-revisions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Dedication Proposals Id</th>
										<th>User Id</th>
										<th>Revision</th>
										<th>Isdone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dedicationProposalRevisions as $dedicationProposalRevision)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dedicationProposalRevision->dedication_proposals_id }}</td>
											<td>{{ $dedicationProposalRevision->user_id }}</td>
											<td>{{ $dedicationProposalRevision->revision }}</td>
											<td>{{ $dedicationProposalRevision->isDone }}</td>

                                            <td>
                                                <form action="{{ route('dedication-proposal-revisions.destroy',$dedicationProposalRevision->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dedication-proposal-revisions.show',$dedicationProposalRevision->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dedication-proposal-revisions.edit',$dedicationProposalRevision->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $dedicationProposalRevisions->links() !!}
            </div>
        </div>
    </div>
@endsection
