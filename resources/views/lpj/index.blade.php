@extends('layouts.dashboard')

@section('template_title')
    Lembar Pertanggung Jawaban
@endsection
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h3>LPJ Masuk</h3>
                                    <p class="text-sm">
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{ $lpj_success }} LPJ selesai</span> tahun
                                        {{ date('Y') }}
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                # Nama Organisasi
                                            </th>
                                            <th>
                                                Nama Proposal
                                            </th>
                                            <th>
                                                Revisi
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($lpjs as $lpj)
                                            <tr>
                                                <td>
                                                    <strong>
                                                        {{ $loop->iteration }}. {{ $lpj->proposal->org_name }}
                                                    </strong>
                                                    </p>
                                                </td>
                                                <td>
                                                    <textarea class="form-control" cols="30" rows="4" readonly>{{ $lpj->proposal->name }}</textarea>
                                                </td>
                                                <td>
                                                    <p class="fw-bold text-primary">
                                                        <i class="fas fa-comment"></i>
                                                        {{ $lpj->lpj_revision->count() }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a class="btn btn-sm btn-info"
                                                            href="{{ route('admin.lpj.finalize', Crypt::encrypt($lpj->proposal_id)) }}"
                                                            target="_blank"><i class="fas fa-eye"></i></a>
                                                        <a class="btn btn-primary btn-sm"
                                                            href="{{ route('admin.print.lpj', Crypt::encrypt($lpj->proposal_id)) }}"
                                                            target="_blank"><i class="fas fa-print"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <small class="fst-italic">
                                                        created at:
                                                        <i class="fas fa-calendar"></i>
                                                        {{ $lpj->created_at->format('M d, Y') }}
                                                    </small>
                                                </td>
                                                <td colspan="3">
                                                    <p class="fw-bold">
                                                        Status:
                                                        @foreach ($lpj->lpj_approval as $lpj_app)
                                                            @php
                                                                $name = $lpj_app->name === 'REKTOR' ? 'WK. REKTOR' : $lpj_app->name;
                                                            @endphp

                                                            @if ($lpj_app->approved == 0)
                                                                <span
                                                                    class="badge rounded-pill bg-danger my-0 text-white">{{ $name }}
                                                                    <i class="fa fa-times faa-pulse animated"></i>
                                                                </span>
                                                            @else
                                                                <span
                                                                    class="badge rounded-pill bg-success my-0 text-white">{{ $name }}
                                                                    <i class="fa fa-check faa-pulse animated"></i>
                                                                </span>
                                                            @endif
                                                        @endforeach
                                                    </p>

                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" align="center">
                                                    <span class="badge bg-danger text-white">Belum ada LPJ Masuk</span>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! $lpjs->links() !!}
    </div>
@endsection
