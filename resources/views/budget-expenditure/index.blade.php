@extends('layouts.app')

@section('template_title')
    Budget Expenditure
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Budget Expenditure') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('budget-expenditures.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Name</th>
										<th>Qty</th>
										<th>Price</th>
										<th>Total</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($budgetExpenditures as $budgetExpenditure)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $budgetExpenditure->proposal_id }}</td>
											<td>{{ $budgetExpenditure->name }}</td>
											<td>{{ $budgetExpenditure->qty }}</td>
											<td>{{ $budgetExpenditure->price }}</td>
											<td>{{ $budgetExpenditure->total }}</td>

                                            <td>
                                                <form action="{{ route('budget-expenditures.destroy',$budgetExpenditure->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('budget-expenditures.show',$budgetExpenditure->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('budget-expenditures.edit',$budgetExpenditure->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $budgetExpenditures->links() !!}
            </div>
        </div>
    </div>
@endsection
