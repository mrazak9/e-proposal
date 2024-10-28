@extends('layouts.dashboard')

@section('template_title')
 Perbarui Pengajuan Penelitian | {{ $researchProposal->title??'' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title"><h3><i class="fas fa-pencil-alt text-success"></i> Perbarui Pengajuan Penelitian | {{ $researchProposal->title??'' }}</h3></span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.research-proposals.update', $researchProposal->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('research-proposal.form')
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                    Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
