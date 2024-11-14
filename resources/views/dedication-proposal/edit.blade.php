@extends('layouts.dashboard')

@section('template_title')
    Update Dedication Proposal
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Dedication Proposal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.dedication-proposals.update', $dedicationProposal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dedication-proposal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
