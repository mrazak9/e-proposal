@extends('layouts.dashboard')

@section('template_title')
    Daftar Dana Operasional
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>Daftar Dana Operasional - Bulan {{ date('F') }}</h3>
                            </span>

                            <div class="float-right">
                                <a href="{{ route('admin.dops.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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
                                        <th>User Id</th>
                                        <th>Organization Id</th>
                                        <th>Amount</th>
                                        <th>Note</th>
                                        <th>Isapproved</th>
                                        <th>Attachment</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($dops as $dop)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $dop->user_id }}</td>
                                            <td>{{ $dop->organization_id }}</td>
                                            <td>{{ $dop->amount }}</td>
                                            <td>{{ $dop->note }}</td>
                                            <td>{{ $dop->isApproved }}</td>
                                            <td>{{ $dop->attachment }}</td>

                                            <td>
                                                <form action="{{ route('admin.dops.destroy', $dop->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('admin.dops.show', $dop->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('admin.dops.edit', $dop->id) }}"><i
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
                                            <td>
                                                <span class="badge bg-danger text-white">
                                                    Belum ada pengajuan DOP untuk Bulan {{ date('F') }} ini. <br>
                                                    Silahkan melakukan pengajuan.
                                                </span>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $dops->links() !!}
            </div>
        </div>
    </div>
@endsection
