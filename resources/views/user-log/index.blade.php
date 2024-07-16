@extends('layouts.dashboard')

@section('template_title')
    User Log
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3><i class="bi bi-clock-history"></i> User Log</h3>
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.user-logs.destroy-all') }}" class="btn btn-primary btn-sm float-right" onclick="return confirm('Hapus semua data user logs?')"  data-placement="left">
                                    <i class="bi bi-trash3-fill"></i> Delete All
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
                            <table class="table table-striped table-hover table-sm">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nama</th>
										<th>IP</th>
										<th>User Agent</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($userLogs as $userLog)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $userLog->user->name }}</td>
											<td>{{ $userLog->ip }}</td>
											<td>{{ $userLog->os }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="4">
                                                <div class="badge bg-warning w-100">
                                                    <p class="text-center text-light"><i class="bi bi-info-circle-fill"></i> Data tidak ditemukan</p>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $userLogs->links() !!}
            </div>
        </div>
    </div>
@endsection
