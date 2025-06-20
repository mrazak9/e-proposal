@extends('layouts.dashboard')

@section('template_title')
    Event
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                <h3>{{ __('Event') }}</h3>
                            </span>

                             <div class="float-right">
                                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#eventModal"><i class="fa fa-plus"></i></button>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                        @include('event.modal')
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Name</th>
										<th>Notes</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr class="align-middle">
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $event->name }}</td>
											<td>{{ $event->notes }}</td>

                                            <td>
                                                <form action="{{ route('admin.events.destroy',$event->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('admin.events.show',$event->id) }}"><i class="bi bi-eye-fill"></i></a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('admin.events.edit',$event->id) }}"><i class="bi bi-pencil"></i></a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('{{ trans('global.areYouSure') }}');"><i class="bi bi-trash"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $events->links() !!}
            </div>
        </div>
    </div>
@endsection
