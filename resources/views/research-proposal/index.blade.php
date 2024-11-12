@extends('layouts.dashboard')

@section('template_title')
    Pengajuan Penelitian Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h4>
                                    <i class="fas fa-paper-plane text-info"></i> Pengajuan Penelitian Saya
                                </h4>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.research-proposals.create') }}"
                                    class="btn btn-primary btn-sm float-right" data-placement="left"
                                    title="Buat Pengajuan Penelitian Baru">
                                    <i class="fas fa-plus-circle"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table table-sm table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jenis <br> SKIM</th>
                                        <th>Lokasi</th>
                                        <th>Tahun <br> Usulan</th>
                                        <th>Tanggal <br> Pelaksanaan</th>
                                        <th>Status <br> Pengajuan</th>
                                        <th>Status <br> Kontrak</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($researchProposals as $researchProposal)
                                        <tr style="vertical-align: middle">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $researchProposal->title }}</td>
                                            <td>
                                                @if ($researchProposal->type_of_skim == 1)
                                                    <small>
                                                        <span class="badge bg-success text-white">Digitalisasi
                                                            Bisnis/Kewirausahaan</span>
                                                    </small>
                                                @elseif ($researchProposal->type_of_skim == 2)
                                                    <span class="badge bg-warning text-white">Digitalisasi
                                                        Akuntansi/Keuangan</span>
                                                @elseif ($researchProposal->type_of_skim == 3)
                                                    <span class="badge bg-info text-white">Digitalisasi
                                                        Akuntansi/Keuangan</span>
                                                @endif
                                            </td>
                                            <td>{{ $researchProposal->location }}</td>
                                            <td>{{ $researchProposal->proposed_year }}</td>
                                            <td>{{ $researchProposal->implementation_date }}</td>
                                            <td>
                                                @if ($researchProposal->application_status == 0)
                                                    <small>
                                                        <span class="badge bg-danger text-white">Draf</span>
                                                    </small>
                                                @elseif ($researchProposal->application_status == 1)
                                                    <small>
                                                        <span class="badge bg-info text-white">Diajukan</span>
                                                    </small>
                                                @elseif ($researchProposal->application_status == 2)
                                                    <small>
                                                        <span class="badge bg-secondary text-white">Revisi</span>
                                                    </small>
                                                @elseif ($researchProposal->application_status == 3)
                                                    <small>
                                                        <span class="badge bg-success text-white"><i
                                                                class="fas fa-check"></i> Disetujui</span>
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($researchProposal->contract_status == 0)
                                                    <small>
                                                        <span class="badge bg-danger text-white">Belum Disetujui</span>
                                                    </small>
                                                @elseif ($researchProposal->contract_status == 1)
                                                    <small>
                                                        <span class="badge bg-success text-white"><i
                                                                class="fas fa-check-double"></i> Disetujui</span>
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.research-proposals.destroy', $researchProposal->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        @can('READ_PENELITIAN')
                                                            <a class="btn btn-sm btn-info "
                                                                href="{{ route('admin.research-proposals.show', $researchProposal->id) }}"><i
                                                                    class="fa fa-fw fa-eye" title="Lihat Proposal"></i></a>
                                                        @endcan
                                                        @can('UPDATE_PENELITIAN')
                                                            @if ($researchProposal->application_status == 3)
                                                                <a class="btn btn-sm btn-secondary" href="#"><i
                                                                        class="fa fa-fw fa-edit"
                                                                        title="Proposal sudah disetujui, tidak bisa edit proposal"></i></a>
                                                            @else
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('admin.research-proposals.edit', $researchProposal->id) }}"><i
                                                                        class="fa fa-fw fa-edit"
                                                                        title="Lengkapi Proposal"></i></a>
                                                            @endif
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('DELETE_PENELITIAN')
                                                            @if ($researchProposal->application_status == 3)
                                                                <a href="#" class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-fw fa-trash"
                                                                        title="Proposal sudah disetujui, hapus tidak dizinkan"></i>
                                                                </a>
                                                            @else
                                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-fw fa-trash" title="Hapus Proposal"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan {{ $researchProposal->title }} ini?');"></i>
                                                                </button>
                                                            @endif
                                                        @endcan
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <span class="badge bg-warning text-white">
                                                    Data Penganjuan Tidak Ditemukan
                                                </span>
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
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
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            // Inisialisasi DataTables
            $('#datatable').DataTable({

            });
        });
    </script>
@endsection
