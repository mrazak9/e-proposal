@extends('layouts.app')

@section('template_title')
    Research Proposal Schedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Research Proposal Schedule') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('research-proposal-schedules.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Year At</th>
										<th>Event Name</th>
										<th>1</th>
										<th>2</th>
										<th>3</th>
										<th>4</th>
										<th>5</th>
										<th>6</th>
										<th>7</th>
										<th>8</th>
										<th>9</th>
										<th>10</th>
										<th>11</th>
										<th>12</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($researchProposalSchedules as $researchProposalSchedule)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $researchProposalSchedule->research_proposals_id }}</td>
											<td>{{ $researchProposalSchedule->year_at }}</td>
											<td>{{ $researchProposalSchedule->event_name }}</td>
											<td>{{ $researchProposalSchedule->1 }}</td>
											<td>{{ $researchProposalSchedule->2 }}</td>
											<td>{{ $researchProposalSchedule->3 }}</td>
											<td>{{ $researchProposalSchedule->4 }}</td>
											<td>{{ $researchProposalSchedule->5 }}</td>
											<td>{{ $researchProposalSchedule->6 }}</td>
											<td>{{ $researchProposalSchedule->7 }}</td>
											<td>{{ $researchProposalSchedule->8 }}</td>
											<td>{{ $researchProposalSchedule->9 }}</td>
											<td>{{ $researchProposalSchedule->10 }}</td>
											<td>{{ $researchProposalSchedule->11 }}</td>
											<td>{{ $researchProposalSchedule->12 }}</td>

                                            <td>
                                                <form action="{{ route('research-proposal-schedules.destroy',$researchProposalSchedule->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('research-proposal-schedules.show',$researchProposalSchedule->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('research-proposal-schedules.edit',$researchProposalSchedule->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $researchProposalSchedules->links() !!}
            </div>
        </div>
    </div>
@endsection
