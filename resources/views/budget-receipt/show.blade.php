@extends('layouts.app')

@section('template_title')
    {{ $budgetReceipt->name ?? 'Show Budget Receipt' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Budget Receipt</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('budget-receipts.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Proposal Id:</strong>
                            {{ $budgetReceipt->proposal_id }}
                        </div>
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $budgetReceipt->name }}
                        </div>
                        <div class="form-group">
                            <strong>Qty:</strong>
                            {{ $budgetReceipt->qty }}
                        </div>
                        <div class="form-group">
                            <strong>Price:</strong>
                            {{ $budgetReceipt->price }}
                        </div>
                        <div class="form-group">
                            <strong>Total:</strong>
                            {{ $budgetReceipt->total }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
