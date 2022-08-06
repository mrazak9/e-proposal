@extends('layouts.dashboard')

@section('template_title')
    Update Proposal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="card-title">
                            <h3>Update Proposal</h3>
                        </span>
                        <div class="float-right">
                            <a title="Back" class="btn btn-sm btn-info" href="{{ route('admin.proposals.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proposals.update', $proposal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('proposal.update')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
