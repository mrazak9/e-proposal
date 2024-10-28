@extends('layouts.app')

@section('template_title')
    Create Research Proposal Detail
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Research Proposal Detail</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('research-proposal-details.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('research-proposal-detail.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
