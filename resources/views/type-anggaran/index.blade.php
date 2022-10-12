@extends('layouts.dashboard')

@section('template_title')
    Type Anggaran
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>{{ __('Type Anggaran') }}</h3>
                            </span>

                            <div class="float-right">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#type_anggaranModal"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    @include('type-anggaran.modal')

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>

                                        <th>Name</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($typeAnggarans as $typeAnggaran)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $typeAnggaran->name }}</td>

                                            <td>
                                                <form action="{{ route('admin.type_anggaran.destroy', $typeAnggaran->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3">
                                                <span class="badge bg-danger text-white">Data Tipe Anggaran Belum Ada</span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $typeAnggarans->links() !!}
            </div>
        </div>
    </div>
@endsection
