@extends('layouts.app')

@section('template_title')
    Research Proposal Detail
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Research Proposal Detail') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('research-proposal-details.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Keyword</th>
										<th>Background</th>
										<th>State Of The Art</th>
										<th>Road Map Research</th>
										<th>Method And Design</th>
										<th>References</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchProposalDetails as $researchProposalDetail)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $researchProposalDetail->research_proposals_id }}</td>
											<td>{{ $researchProposalDetail->keyword }}</td>
											<td>{{ $researchProposalDetail->background }}</td>
											<td>{{ $researchProposalDetail->state_of_the_art }}</td>
											<td>{{ $researchProposalDetail->road_map_research }}</td>
											<td>{{ $researchProposalDetail->method_and_design }}</td>
											<td>{{ $researchProposalDetail->references }}</td>

                                            <td>
                                                <form action="{{ route('research-proposal-details.destroy',$researchProposalDetail->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('research-proposal-details.show',$researchProposalDetail->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('research-proposal-details.edit',$researchProposalDetail->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $researchProposalDetails->links() !!}
            </div>
        </div>
    </div>
@endsection
