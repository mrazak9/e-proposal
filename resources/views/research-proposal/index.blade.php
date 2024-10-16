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
                                    class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Create New') }}
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
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Jenis SKIM</th>
                                        <th>Lokasi</th>
                                        <th>Tahun Usulan</th>
                                        <th>Tanggal Pelaksanaan</th>
                                        <th>Lama Kegiatan</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($researchProposals as $researchProposal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $researchProposal->title }}</td>
                                            <td>{{ $researchProposal->type_of_skim }}</td>
                                            <td>{{ $researchProposal->location }}</td>
                                            <td>{{ $researchProposal->proposed_year }}</td>
                                            <td>{{ $researchProposal->implementation_date }}</td>
                                            <td>{{ $researchProposal->length_of_activity }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('admin.research-proposals.destroy', $researchProposal->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.research-proposals.show', $researchProposal->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.research-proposals.edit', $researchProposal->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
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
