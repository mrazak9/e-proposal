@extends('layouts.app')

@section('template_title')
    Research Proposals Member
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Research Proposals Member') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('research-proposals-members.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Name</th>
										<th>Identity Number</th>
										<th>Affiliation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchProposalsMembers as $researchProposalsMember)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $researchProposalsMember->research_proposals_id }}</td>
											<td>{{ $researchProposalsMember->name }}</td>
											<td>{{ $researchProposalsMember->identity_number }}</td>
											<td>{{ $researchProposalsMember->affiliation }}</td>

                                            <td>
                                                <form action="{{ route('research-proposals-members.destroy',$researchProposalsMember->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('research-proposals-members.show',$researchProposalsMember->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('research-proposals-members.edit',$researchProposalsMember->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $researchProposalsMembers->links() !!}
            </div>
        </div>
    </div>
@endsection
