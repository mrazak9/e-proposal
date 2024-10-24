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
                                    class="btn btn-primary btn-sm float-right" data-placement="left" title="Buat Pengajuan Penelitian Baru">
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
                                        <th>Jenis SKIM</th>
                                        <th>Lokasi</th>
                                        <th>Tahun Usulan</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($researchProposals as $researchProposal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $researchProposal->title }}</td>
                                            <td>
                                                @if ($researchProposal->type_of_skim == 1)
                                                    <small>
                                                        <span class="badge bg-success text-white">Digitalisasi
                                                            Bisnis/Kewirausahaan</span>
                                                    </small>
                                                @elseif ($researchProposal->type_of_skim == 2)
                                                    <span class="bg bg-warning">Digitalisasi Akuntansi/Keuangan</span>
                                                @elseif ($researchProposal->type_of_skim == 3)
                                                    <span class="bg bg-info">Digitalisasi Akuntansi/Keuangan</span>
                                                @endif
                                            </td>
                                            <td>{{ $researchProposal->location }}</td>
                                            <td>{{ $researchProposal->proposed_year }}</td>
                                            <td>{{ $researchProposal->implementation_date }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.research-proposals.destroy', $researchProposal->id) }}"
                                                    method="POST">
                                                    <div class="btn-group">

                                                        <a class="btn btn-sm btn-info "
                                                            href="{{ route('admin.research-proposals.show', $researchProposal->id) }}"><i
                                                                class="fa fa-fw fa-eye" title="Lihat Proposal"></i></a>
                                                        <a class="btn btn-sm btn-success"
                                                            href="{{ route('admin.research-proposals.edit', $researchProposal->id) }}"><i
                                                                class="fa fa-fw fa-edit" title="Lengkapi Proposal"></i></a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="fa fa-fw fa-trash" title="Hapus Proposal"></i></button>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td align="center" colspan="8">
                                                <span class="badge bg-warning text-white">
                                                    Data Penganjuan Tidak Ditemukan
                                                </span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $researchProposals->links() !!}
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
        // Inisialisasi DataTables
        $('#datatable').DataTable();
    });
</script>
@endsection
