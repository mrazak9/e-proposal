@extends('layouts.app')

@section('template_title')
    Dedication Proposal Member
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Dedication Proposal Member') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('dedication-proposal-members.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Name</th>
										<th>Identity Number</th>
										<th>Affiliation</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dedicationProposalMembers as $dedicationProposalMember)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $dedicationProposalMember->dedication_proposals_id }}</td>
											<td>{{ $dedicationProposalMember->name }}</td>
											<td>{{ $dedicationProposalMember->identity_number }}</td>
											<td>{{ $dedicationProposalMember->affiliation }}</td>

                                            <td>
                                                <form action="{{ route('dedication-proposal-members.destroy',$dedicationProposalMember->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('dedication-proposal-members.show',$dedicationProposalMember->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('dedication-proposal-members.edit',$dedicationProposalMember->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $dedicationProposalMembers->links() !!}
            </div>
        </div>
    </div>
@endsection
