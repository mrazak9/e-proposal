@extends('layouts.app')

@section('template_title')
    Create Dedication Proposal Member
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Dedication Proposal Member</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dedication-proposal-members.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('dedication-proposal-member.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
