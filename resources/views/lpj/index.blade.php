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

                                        <th>Nama Proposal</th>
                                        <th>Disetujui?</th>
                                        <th>Aksi</th>

                                        {{-- <th>
                                        </th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lpjs as $lpj)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td><a class="btn btn-sm btn-primary"
                                                    href="{{ route('admin.lpjs.show', Crypt::encrypt($lpj->id)) }}"
                                                    target="_blank">
                                                    {{ $lpj->proposal->org_name }} |
                                                    {{ $lpj->proposal->name }}</a>

                                            </td>
                                            <td>
                                                @if ($lpj->is_approved == 0)
                                                    <span class="btn btn-sm btn-danger text-white"><i class="fas fa-times">
                                                            Belum
                                                            disetujui</i></span>
                                                @else
                                                    <span class="btn btn-sm btn-success text-white"><i class="fas fa-check">
                                                            Sudah
                                                            disetujui</i></span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($lpj->is_approved == 0)
                                                    <form action="{{ route('admin.lpj.approve') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="lpj_id" value="{{ $lpj->id }}">
                                                        <button type="submit" class="btn btn-sm btn-success"
                                                            title="Setujui?" style="padding-left: 1em"><i
                                                                class="fas fa-check"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('admin.lpj.revoke') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="lpj_id" value="{{ $lpj->id }}">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            title="Batalkan?" style="padding-left: 1em"><i
                                                                class="fas fa-times"></i></button>
                                                    </form>
                                                @endif
                                            @empty
                                        <tr>

                                            <td colspan="4" align="center"><span class="badge bg-danger text-white">Belum
                                                    ada data LPJ
                                                    Masuk</span>
                                            </td>
                                        </tr>
                                        </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $lpjs->links() !!}
            </div>
        </div>
    </div>
@endsection
