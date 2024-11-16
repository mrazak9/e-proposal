@extends('layouts.dashboard')

@section('template_title')
Pengajuan Pengabdian Saya
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                             <h4><i class="fas fa-paper-plane text-success"></i> Pengajuan Pengabdian Saya</h4>   
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.dedication-proposals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                    @forelse ($dedicationProposals as $dedicationProposals)
                                        <tr style="vertical-align: middle">
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $dedicationProposals->title }}</td>
                                            <td>
                                                @if ($dedicationProposals->type_of_skim == 1)
                                                    <small>
                                                        <span class="badge bg-success text-white">Digitalisasi
                                                            Bisnis/Kewirausahaan</span>
                                                    </small>
                                                @elseif ($dedicationProposals->type_of_skim == 2)
                                                    <span class="badge bg-warning text-white">Digitalisasi
                                                        Akuntansi/Keuangan</span>
                                                @elseif ($dedicationProposals->type_of_skim == 3)
                                                    <span class="badge bg-info text-white">Digitalisasi
                                                        Akuntansi/Keuangan</span>
                                                @endif
                                            </td>
                                            <td>{{ $dedicationProposals->location }}</td>
                                            <td>{{ $dedicationProposals->proposed_year }}</td>
                                            <td>{{ $dedicationProposals->implementation_date }}</td>
                                            <td>
                                                @if ($dedicationProposals->application_status == 0)
                                                    <small>
                                                        <span class="badge bg-danger text-white">Draf</span>
                                                    </small>
                                                @elseif ($dedicationProposals->application_status == 1)
                                                    <small>
                                                        <span class="badge bg-info text-white">Diajukan</span>
                                                    </small>
                                                @elseif ($dedicationProposals->application_status == 2)
                                                    <small>
                                                        <span class="badge bg-secondary text-white">Revisi</span>
                                                    </small>
                                                @elseif ($dedicationProposals->application_status == 3)
                                                    <small>
                                                        <span class="badge bg-success text-white"><i
                                                                class="fas fa-check"></i> Disetujui</span>
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($dedicationProposals->contract_status == 0)
                                                    <small>
                                                        <span class="badge bg-danger text-white">Belum Disetujui</span>
                                                    </small>
                                                @elseif ($dedicationProposals->contract_status == 1)
                                                    <small>
                                                        <span class="badge bg-success text-white"><i
                                                                class="fas fa-check-double"></i> Disetujui</span>
                                                    </small>
                                                @endif
                                            </td>
                                            <td>
                                                <form
                                                    action="{{ route('admin.dedication-proposals.destroy', $dedicationProposals->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">
                                                        @can('READ_PENELITIAN')
                                                            <a class="btn btn-sm btn-info "
                                                                href="{{ route('admin.dedication-proposals.show', $dedicationProposals->id) }}"><i
                                                                    class="fa fa-fw fa-eye" title="Lihat Proposal"></i></a>
                                                        @endcan
                                                        @can('UPDATE_PENELITIAN')
                                                            @if ($dedicationProposals->application_status == 3)
                                                                <a class="btn btn-sm btn-secondary" href="#"><i
                                                                        class="fa fa-fw fa-edit"
                                                                        title="Proposal sudah disetujui, tidak bisa edit proposal"></i></a>
                                                            @else
                                                                <a class="btn btn-sm btn-success"
                                                                    href="{{ route('admin.dedication-proposals.edit', $dedicationProposals->id) }}"><i
                                                                        class="fa fa-fw fa-edit"
                                                                        title="Lengkapi Proposal"></i></a>
                                                            @endif
                                                        @endcan
                                                        @csrf
                                                        @method('DELETE')
                                                        @can('DELETE_PENELITIAN')
                                                            @if ($dedicationProposals->application_status == 3)
                                                                <a href="#" class="btn btn-secondary btn-sm"><i
                                                                        class="fa fa-fw fa-trash"
                                                                        title="Proposal sudah disetujui, hapus tidak dizinkan"></i>
                                                                </a>
                                                            @else
                                                                <button type="submit" class="btn btn-danger btn-sm"><i
                                                                        class="fa fa-fw fa-trash" title="Hapus Proposal"
                                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus pengajuan {{ $dedicationProposals->title }} ini?');"></i>
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
                                                    Data Pengajuan Tidak Ditemukan
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
