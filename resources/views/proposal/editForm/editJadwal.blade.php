<script>
    var msg = '{{Session::get('alert_planning')}}';
    var exist = '{{Session::has('alert_planning')}}';
    if(exist){
      alert(msg);
    }
  </script>
<table class="table table-hover table-borderless">
    <thead class="thead-inverse">
        <tr>
            <th>#</th>
            <th>Nama Perencanaan</th>
            <th>PIC</th>
            <th>Tanggal</th>
            <th>Notes</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexJadwal = 0)
        @forelse ($planning_schedule as $ps)
            <tr class="align-middle">
                <form action="{{ route('admin.planning.update', $ps->id) }}" method="POST">
                    @csrf
                    <td>{{ ++$indexJadwal }}</td>
                    <td scope="row"><input type="text" class="form-control" name="kegiatan"
                            value="{{ $ps->kegiatan }}"></td>
                    <td><select class="form-control" name="user_id">
                            <option value="{{ $ps->user_id }}" selected>{{ $ps->user->name }}</option>
                            @foreach ($student as $value => $key)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select></td>
                    <td>
                        <input type="date" class="form-control" name="date" placeholder="Tanggal Acara"
                            maxlength="10" value="{{ $ps->date }}">
                    </td>
                    <td>
                        <input type="text" name='notes' class="form-control" value="{{ $ps->notes }}" />
                    </td>

                    <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}"
                                name="proposal_id">
                            <button type="submit" class="btn btn-warning btn-sm"><i
                                    class="bi bi-pencil"></i></button></span>
                </form>
                </td>
                <td>
                    <form action="{{ route('admin.planning.destroy', $ps->id) }}" method="GET">
                        <input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @empty
            <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi dahulu</span>
        @endforelse
    </tbody>
</table>
<a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#jadwalModal"><i class="fas fa-plus"></i> Jadwal Perencanaan</a>
@include('proposal.modal.jadwalModal')
