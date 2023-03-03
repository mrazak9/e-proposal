@extends('layouts.dashboard')

@section('template_title')
    Lpj
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>Report LPJ Masuk</h3>
                            </span>
                            <div class="float-right">

                                <form action="{{ route('admin.lpj.search') }}" method="GET">
                                    <input type="text" class="btn btn-sm btn-outline-warning" name="search"
                                        value="{{ request('search') }}" placeholder="Cari LPJ">
                                    <button class="btn btn-sm btn-warning" type="submit"><i
                                            class="fas fa-search"></i></button>
                                </form>

                            </div>
                        </div>

                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 1em">
            @forelse ($lpjs as $lpj)
                <div class="col-md-4" style="margin-top: 1em; margin-bottom: 1em">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/illustration-e-mail-protection-concept-e-mail-envelope-with-file-document-attach-file-system-security-approved_1150-41788.jpg?w=996&t=st=1667441834~exp=1667442434~hmac=551dd281564bc22b17d512d125765dbb462c64121b60d3a1286385d39bc2be28"
                            class="card-img-top">
                        <div class="card-header" style="padding: 5%">
                            <div class="card-header">
                                <div style="display: flex; justify-content: space-between; align-items: center;">

                                    <span id="card_title">
                                        <h5 class="card-title">{{ ++$i }}. {{ $lpj->proposal->org_name }}</h5>
                                    </span>

                                    <div class="float-right">
                                        <div class="btn-group">
                                            <a class="btn btn-sm btn-info"
                                                href="{{ route('admin.lpj.finalize', Crypt::encrypt($lpj->proposal_id)) }}"
                                                target="_blank"><i class="fas fa-eye"></i></a>
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('admin.print.lpj', Crypt::encrypt($lpj->proposal_id)) }}"
                                                target="_blank"><i class="fas fa-print"></i></a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-body" style="padding: 5%">
                            <p class="card-text"><strong>Nama Proposal:</strong><br>{{ $lpj->proposal->name }}</p>
                            <strong>Revisi</strong> <span class="badge bg-warning"
                                style="color: white">{{ $lpj->lpj_revision->count() }}</span>
                        </div>
                        <div class="card-footer" style="padding: 5%">
                            <h6>Status Persetujuan</h6>
                            <hr>
                            @foreach ($lpj->lpj_approval as $lpj_app)
                                @if ($lpj_app->approved == 0)
                                    <span class="badge bg-danger"
                                        style="color: white; margin-top:5px; margin-bottom:5px">{{ $lpj_app->name }} <i
                                            class="fa fa-times faa-pulse animated"></i></span>
                                @else
                                    <span class="badge bg-success"
                                        style="color: white; margin-top:5px; margin-bottom:5px">{{ $lpj_app->name }} <i
                                            class="fa fa-check faa-pulse animated"></i></span>
                                @endif
                            @endforeach
                            <br><i class="bi bi-clock"> created at: {{ $lpj->created_at }}</i>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="card" style="width: 50%; left:25%; right: 25%">
                        <img src="https://img.freepik.com/free-photo/puzzled-stupefied-caucasian-woman-checks-newsfeed-social-networks-cell-phone-messages-with-friend-finds-out-shocking-news-stares-screen_273609-25041.jpg?w=996&t=st=1667444106~exp=1667444706~hmac=4379133ad65f89254e88d61941f4d501e00c8c53819f7dbe0937dd0af70505af"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title text-center">Belum ada LPJ Masuk</h5>
                            <p class="card-text text-center">Ayo segera ingatkan untuk segera selesaikan LPJ 😘</p>
                        </div>
                    </div>
                </div>
            @endforelse
            {!! $lpjs->links() !!}
        </div>
    </div>
@endsection
