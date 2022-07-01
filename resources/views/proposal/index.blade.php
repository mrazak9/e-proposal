@extends('layouts.dashboard')

@section('template_title')
    Proposal
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Proposal') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('admin.proposals.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Latar Belakang</th>
										<th>Tujuan Kegiatan</th>
										<th>Id Tempat</th>
										<th>Tanggal</th>
										<th>Id Kegiatan</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $proposal->name }}</td>
											<td>{{ $proposal->latar_belakang }}</td>
											<td>{{ $proposal->tujuan_kegiatan }}</td>
											<td>{{ $proposal->id_tempat }}</td>
											<td>{{ $proposal->tanggal }}</td>
											<td>{{ $proposal->id_kegiatan }}</td>

                                            <td>
                                                <form action="{{ route('admin.proposals.destroy',$proposal->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.proposals.show',$proposal->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.proposals.edit',$proposal->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $proposals->links() !!}
            </div>
        </div>
    </div>
@endsection