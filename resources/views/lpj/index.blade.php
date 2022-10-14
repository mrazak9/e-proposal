@extends('layouts.app')

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
                                {{ __('Lpj') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('lpjs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Proposal Id</th>
										<th>Keberhasilan</th>
										<th>Kendala</th>
										<th>Notes</th>
										<th>Link Lampiran</th>
										<th>Link Dokumentasi Kegiatan</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lpjs as $lpj)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $lpj->proposal_id }}</td>
											<td>{{ $lpj->keberhasilan }}</td>
											<td>{{ $lpj->kendala }}</td>
											<td>{{ $lpj->notes }}</td>
											<td>{{ $lpj->link_lampiran }}</td>
											<td>{{ $lpj->link_dokumentasi_kegiatan }}</td>

                                            <td>
                                                <form action="{{ route('lpjs.destroy',$lpj->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('lpjs.show',$lpj->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('lpjs.edit',$lpj->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $lpjs->links() !!}
            </div>
        </div>
    </div>
@endsection
