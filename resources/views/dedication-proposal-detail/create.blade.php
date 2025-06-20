@extends('layouts.app')

@section('template_title')
    Create Dedication Proposal Detail
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Dedication Proposal Detail</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dedication-proposal-details.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('dedication-proposal-detail.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
