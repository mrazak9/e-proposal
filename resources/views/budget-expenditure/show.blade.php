@extends('layouts.app')

@section('template_title')
    {{ $budgetExpenditure->name ?? 'Show Budget Expenditure' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Budget Expenditure</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('budget-expenditures.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $budgetExpenditure->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $budgetExpenditure->name }}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {{ $budgetExpenditure->qty }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $budgetExpenditure->price }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $budgetExpenditure->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
