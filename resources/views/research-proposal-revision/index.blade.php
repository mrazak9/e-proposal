@extends('layouts.app')

@section('template_title')
    Research Proposal Revision
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Research Proposal Revision') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('research-proposal-revisions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Research Proposals Id</th>
										<th>User Id</th>
										<th>Revision</th>
										<th>Isdone</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchProposalRevisions as $researchProposalRevision)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $researchProposalRevision->research_proposals_id }}</td>
											<td>{{ $researchProposalRevision->user_id }}</td>
											<td>{{ $researchProposalRevision->revision }}</td>
											<td>{{ $researchProposalRevision->isDone }}</td>

                                            <td>
                                                <form action="{{ route('research-proposal-revisions.destroy',$researchProposalRevision->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('research-proposal-revisions.show',$researchProposalRevision->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('research-proposal-revisions.edit',$researchProposalRevision->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $researchProposalRevisions->links() !!}
            </div>
        </div>
    </div>
@endsection
