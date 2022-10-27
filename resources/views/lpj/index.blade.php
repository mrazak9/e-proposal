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
                                        <th>Input Realisasi?</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($lpjs as $lpj)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td><a class="btn btn-sm text-black"
                                                    href="{{ route('admin.lpj.finalize', Crypt::encrypt($lpj->proposal_id)) }}"
                                                    target="_blank">
                                                    {{ $lpj->proposal->org_name }} |
                                                    {{ $lpj->proposal->name }}</a>

                                            </td>
                                            <td>

                                            </td>
                                            <td>
                                                <button class="btn btn-info btn-sm" type="submit"> <i
                                                        class="fas fa-eye"></i></button>
                                            </td>
                                        @empty
                                        <tr>

                                            <td colspan="4" align="center"><span class="badge bg-danger text-white">Belum
                                                    ada data LPJ
                                                    Masuk</span>
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
