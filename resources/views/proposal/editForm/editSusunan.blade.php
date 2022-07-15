<table class="table table-hover table-borderless">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Kegiatan</th>
            <th>PIC</th>
            <th>Waktu</th>
            <th>Notes</th>
            <th colspan="2">Aksi</th>
        </tr>
        </thead>
        <tbody>
            @php($indexSchedule = 0)    
            @foreach ($schedule as $s)                                            
            <tr class="align-middle">
                <form action="{{ route('admin.schedule.update', $s->id) }}" method="POST">
                    @csrf
                
                <td>{{ ++$indexSchedule }}</td>
                <td scope="row"><input type="text" class="form-control" name="kegiatan" value="{{ $s->kegiatan }}"></td>
                <td><select class="form-control" name="user_id">
                    <option value="{{ $s->user_id }}" selected>{{ $s->user->name }}</option>
                    @foreach ($student as $value => $key)
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endforeach
                </select></td>
                <td>
                    <input type="time" class="form-control" name="times" placeholder="Waktu Acara"
                        maxlength="10" value="{{ $s->times }}">
                </td>
                <td>
                    <input type="text" name='notes' class="form-control" value="{{$s->notes}}" />
                </td>
           
                <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}" name="proposal_id"> 
                    <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button></span>
                </form>
                </td>
                <td>
                    <form action="{{ route('admin.schedule.destroy', $s->id) }}" method="GET">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</table>
<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#susunanModal">Add Susunan Acara</a>
@include('proposal.modal.susunanModal')