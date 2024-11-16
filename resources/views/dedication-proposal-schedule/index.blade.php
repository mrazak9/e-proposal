@extends('layouts.app')

@section('template_title')
    Dedication Proposal Schedule
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dedication Proposal Schedule') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dedication-proposal-schedules.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($dedicationProposalSchedules as $dedicationProposalSchedule)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dedicationProposalSchedule->dedication_proposals_id }}</td>
											<td>{{ $dedicationProposalSchedule->year_at }}</td>
											<td>{{ $dedicationProposalSchedule->event_name }}</td>
											<td>{{ $dedicationProposalSchedule->1 }}</td>
											<td>{{ $dedicationProposalSchedule->2 }}</td>
											<td>{{ $dedicationProposalSchedule->3 }}</td>
											<td>{{ $dedicationProposalSchedule->4 }}</td>
											<td>{{ $dedicationProposalSchedule->5 }}</td>
											<td>{{ $dedicationProposalSchedule->6 }}</td>
											<td>{{ $dedicationProposalSchedule->7 }}</td>
											<td>{{ $dedicationProposalSchedule->8 }}</td>
											<td>{{ $dedicationProposalSchedule->9 }}</td>
											<td>{{ $dedicationProposalSchedule->10 }}</td>
											<td>{{ $dedicationProposalSchedule->11 }}</td>
											<td>{{ $dedicationProposalSchedule->12 }}</td>

                                            <td>
                                                <form action="{{ route('dedication-proposal-schedules.destroy',$dedicationProposalSchedule->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dedication-proposal-schedules.show',$dedicationProposalSchedule->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dedication-proposal-schedules.edit',$dedicationProposalSchedule->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $dedicationProposalSchedules->links() !!}
            </div>
        </div>
    </div>
@endsection
