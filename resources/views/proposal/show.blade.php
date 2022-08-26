@extends('layouts.dashboard')

@section('template_title')
    {{ $proposal->name ?? 'Show Proposal' }}
@endsection
@push('custom-scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('a[data-bs-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab', $(e.target).attr('href'));
            });
            var activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                $('#ex1 a[href="' + activeTab + '"]').tab('show');
            }
        });
    </script>
@endpush
@section('content')
    <section class="content container-fluid">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        <h3>Show Proposal</h3>
                    </span>

                    <div class="float-right">
                        <a data-bs-toggle="tooltip" data-bs-placement="top" title="Back" class="btn btn-sm btn-info"
                            href="{{ route('admin.proposals.index') }}"><i class="bi bi-arrow-left-circle"></i></a>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Proposal"
                                class="btn btn-sm btn-success"
                                href="{{ route('admin.proposals.edit', Crypt::encrypt($proposal->id)) }}"><i
                                    class="bi bi-pen"></i></a>
                        @endcan


                        @can('CREATE_REVISION')
                            <a title="Add Revisi" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                data-bs-target="#revisiModal"><i class="bi bi-journal-check"></i></a>
                            @include('proposal.modal.revisiModal')
                        @endcan


                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Nama Proposal</label>
                            <input type="text" class="form-control" name="name" value="{{ $proposal->name }}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Tempat</label>
                            <select class="form-control" name="id_tempat" disabled>
                                <option value="{{ $proposal->id_tempat }}">{{ $proposal->place->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" maxlength="10"
                                value="{{ $proposal->tanggal }}" disabled>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Tujuan Kegiatan</label>
                            <textarea class="form-control" name="tujuan_kegiatan" rows="3" disabled>{{ $proposal->tujuan_kegiatan }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Latar Belakang</label>
                            <textarea class="form-control" name="latar_belakang" rows="5" disabled>{{ $proposal->latar_belakang }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label>Event</label>
                            <select class="form-control" name="id_kegiatan" disabled>
                                <option value="{{ $proposal->id_kegiatan }}">{{ $proposal->event->name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Organisasi</label>
                            <input type="text" class="form-control" name="org_name" value="{{ $proposal->org_name }}"
                                disabled>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label>Jenis Organisasi</label>
                            <input type="text" class="form-control" name="owner" value="{{ $proposal->owner }}"
                                disabled>
                        </div>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12">
                        <!-- Tabs navs -->
                        <ul class="nav nav-tabs mb-3" id="ex1" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="ex1-tab-6" data-bs-toggle="tab" href="#ex1-tabs-6"
                                    role="tab" aria-controls="ex1-tabs-6" aria-selected="false">Kepanitiaan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-1" data-bs-toggle="tab" href="#ex1-tabs-1" role="tab"
                                    aria-controls="ex1-tabs-1" aria-selected="true">Penerimaan
                                    Anggaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-2" data-bs-toggle="tab" href="#ex1-tabs-2" role="tab"
                                    aria-controls="ex1-tabs-2" aria-selected="false">Pengeluaran
                                    Anggaran</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-3" data-bs-toggle="tab" href="#ex1-tabs-3"
                                    role="tab" aria-controls="ex1-tabs-3" aria-selected="false">Jadwal
                                    Perencanaan</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-4" data-bs-toggle="tab" href="#ex1-tabs-4"
                                    role="tab" aria-controls="ex1-tabs-4" aria-selected="false">Susunan Acara</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="ex1-tab-5" data-bs-toggle="tab" href="#ex1-tabs-5"
                                    role="tab" aria-controls="ex1-tabs-5" aria-selected="false">Peserta</a>
                            </li>
                        </ul>
                        <!-- Tabs navs -->

                        <!-- Tabs content -->
                        <div class="tab-content" id="ex1-content">
                            <div class="tab-pane fade" id="ex1-tabs-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                @include('proposal.showForm.showPenerimaan')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                @include('proposal.showForm.showPengeluaran')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                @include('proposal.showForm.showJadwal')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-4" role="tabpanel" aria-labelledby="ex1-tab-4">
                                @include('proposal.showForm.showSusunan')
                            </div>
                            <div class="tab-pane fade" id="ex1-tabs-5" role="tabpanel" aria-labelledby="ex1-tab-5">
                                @include('proposal.showForm.showPeserta')
                            </div>
                            <div class="tab-pane fade show active" id="ex1-tabs-6" role="tabpanel"
                                aria-labelledby="ex1-tab-6">
                                @include('proposal.showForm.showKepanitiaan')
                            </div>

                        </div>

                        <script type="text/javascript">
                            $(document).ready(function() {

                                // Format mata uang.
                                $('.uang').mask('000.000.000', {
                                    reverse: true
                                });

                            })
                        </script>
                        <!-- Tabs content -->

                    </div>
                </div>
                <div class="row">
                    @canany('CREATE_REVISION')
                        <div class="col-md-12">
                            <h5>Setujui?</h5>
                        </div>
                    @endcanany


                    @include('proposal.approval')
                    <div class="col-md-12">
                        <h5>Status Proposal</h5>
                        @forelse ($approved as $appList)
                            <span class="badge bg-success" style="color: white">{{ $appList->name }} <i
                                    class="bi bi-check"></i></span>
                        @empty
                            <span class="badge bg-danger" style="color: white">Belum disetujui<i
                                    class="bi bi-x"></i></span>
                        @endforelse
                    </div>
                </div>
    </section>
    </div>
    </div>
    </div>
    </section>
    <br />
    <section class="content container-fluid">
        <div class="card">
            <div class="card-header">
                <h5>Revisions</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Revisi</th>
                            <th>Tanggal</th>
                            @can('PANITIA_UPDATE_PROPOSAL')
                                <th>Selesai?</th>
                            @endcan
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($indexRevision = 0)
                        @forelse ($revisions as $r)
                            <tr class="align-middle">
                                <td>{{ ++$indexRevision }}</td>
                                <td>{{ $r->user->name }}</td>
                                <td>
                                    @if ($r->isDone == 1)
                                        <s>{{ $r->revision }}</s>
                                    @else
                                        {{ $r->revision }}
                                    @endif
                                </td>
                                <td>{{ $r->created_at }}</td>
                                @can('PANITIA_UPDATE_PROPOSAL')
                                    <td>
                                        @if ($r->isDone == 0)
                                            <form action="{{ route('admin.revision.done', $r->id) }}" method="POST">
                                                @csrf

                                                <button class="btn btn-sm btn-danger">
                                                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                                    <i class="bi bi-x-lg" style="color: white"></i>
                                                </button>


                                            </form>
                                        @else
                                            <form action="{{ route('admin.revision.undone', $r->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-sm btn-info">
                                                    <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                                    <i class="bi bi-check-circle" style="color: white"></i>
                                                </button>

                                            </form>
                                        @endif
                                    </td>
                                @endcan
                                <td>
                                    @can('UPDATE_REVISION')
                                        <form action="{{ route('admin.revisions.destroy', $r->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                                            @if (Auth::user()->id != $r->user_id)
                                                <span class="btn btn-sm btn-secondary"><i class="bi bi-trash"
                                                        disabled></i></span>
                                            @else
                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                        class="bi bi-trash"></i></button>
                                            @endif


                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada data revisi</td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

            </div>
        </div>
        <br />
        <div class="card">
            <div class="card-header">
                <h5>Log Approvals</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>#</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($indexApproval = 0)
                        @foreach ($approvals as $app)
                            <tr>
                                <td>{{ ++$indexApproval }}</td>
                                <td>
                                    @switch($app->approved)
                                        @case(0)
                                            <span class="badge bg-danger" style="color: white">Need Approved</span>
                                            <span class="badge bg-warning" style="color: white">by {{ $app->name }}</span>
                                        @break

                                        @case(1)
                                            <span class="badge bg-info" style="color: white">Approved</span>
                                            <span class="badge bg-success" style="color: white">by {{ $app->name }}</span>
                                        @break

                                        @default
                                    @endswitch

                                </td>
                                <td>{{ $app->date }}</td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
