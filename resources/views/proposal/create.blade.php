@extends('layouts.dashboard')

@section('template_title')
    Create Proposal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Proposal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proposals.store') }}"  role="form" enctype="multipart/form-data" name="form">
                            @csrf

                            @include('proposal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
