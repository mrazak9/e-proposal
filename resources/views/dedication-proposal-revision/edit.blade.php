@extends('layouts.app')

@section('template_title')
    Update Dedication Proposal Revision
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Dedication Proposal Revision</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('dedication-proposal-revisions.update', $dedicationProposalRevision->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('dedication-proposal-revision.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
