@extends('layouts.app')

@section('template_title')
    Budget Receipt
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Budget Receipt') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('budget-receipts.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @foreach ($budgetReceipts as $budgetReceipt)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $budgetReceipt->proposal_id }}</td>
											<td>{{ $budgetReceipt->name }}</td>
											<td>{{ $budgetReceipt->qty }}</td>
											<td>{{ $budgetReceipt->price }}</td>
											<td>{{ $budgetReceipt->total }}</td>

                                            <td>
                                                <form action="{{ route('budget-receipts.destroy',$budgetReceipt->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('budget-receipts.show',$budgetReceipt->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('budget-receipts.edit',$budgetReceipt->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $budgetReceipts->links() !!}
            </div>
        </div>
    </div>
@endsection
