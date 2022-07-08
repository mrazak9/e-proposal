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
                        <span class="card-title">Update Proposal</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.proposals.update', $proposal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('proposal.update')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
