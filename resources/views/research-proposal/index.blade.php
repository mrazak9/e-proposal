@extends('layouts.dashboard')

@section('template_title')
    Research Proposal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Research Proposal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.research-proposals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Title</th>
										<th>Research Group</th>
										<th>Cluster Of Knowledge</th>
										<th>Type Of Skim</th>
										<th>Location</th>
										<th>Proposed Year</th>
										<th>Length Of Activity</th>
										<th>Source Of Funds</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchProposals as $researchProposal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $researchProposal->user_id }}</td>
											<td>{{ $researchProposal->title }}</td>
											<td>{{ $researchProposal->research_group }}</td>
											<td>{{ $researchProposal->cluster_of_knowledge }}</td>
											<td>{{ $researchProposal->type_of_skim }}</td>
											<td>{{ $researchProposal->location }}</td>
											<td>{{ $researchProposal->proposed_year }}</td>
											<td>{{ $researchProposal->length_of_activity }}</td>
											<td>{{ $researchProposal->source_of_funds }}</td>

                                            <td>
                                                <form action="{{ route('admin.research-proposals.destroy',$researchProposal->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.research-proposals.show',$researchProposal->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.research-proposals.edit',$researchProposal->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $researchProposals->links() !!}
            </div>
        </div>
    </div>
@endsection
