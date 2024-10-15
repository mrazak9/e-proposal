@extends('layouts.dashboard')

@section('template_title')
    Update Research Proposal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Research Proposal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.research-proposals.update', $researchProposal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('research-proposal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
