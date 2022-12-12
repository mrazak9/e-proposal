<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama <br>Kegiatan</th>
                <th>PIC</th>
                <th>Tanggal</th>
                <th>Waktu <br>Mulai</th>
                <th>Waktu <br>Selesai</th>
                <th>Notes</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th colspan="2">Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexSchedule = 0)
            @forelse ($schedule as $s)
                <tr class="align-middle">
                    <form action="{{ route('admin.schedule.update', $s->id) }}" method="POST">
                        @csrf

                        <td>{{ ++$indexSchedule }}</td>
                        <td>
                            <textarea name="kegiatan" class="form-control" cols="20" rows="3" required>{{ $s->kegiatan }}</textarea>
                        <td><select class="form-control" name="user_id">
                                <option value="{{ $s->user_id }}" selected>{{ $s->user->name }}</option>
                                @foreach ($student as $value)
                                    <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                                @endforeach
                            </select></td>
                        <td>
                            <input type="date" class="form-control" name="date" placeholder="Tanggal Acara"
                                maxlength="10" value="{{ $s->date }}">
                        </td>
                        <td>
                            <input type="time" class="form-control" name="times" placeholder="Waktu Acara"
                                maxlength="10" value="{{ $s->times }}">
                        </td>
                        <td>
                            <input type="time" class="form-control" name="end_time" placeholder="Waktu Acara"
                                maxlength="10" value="{{ $s->end_time }}">
                        </td>
                        <td>
                            <textarea name='notes' class="form-control" rows="3" cols="15" maxlength="100">{{ $s->notes }}</textarea>
                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td><span class="align-middle"><input type="hidden"
                                        value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                                    <button type="submit" class="btn btn-warning btn-sm"><i
                                            class="bi bi-pencil"></i></button></span>
                        </form>
                        </td>
                        <td>
                            <form action="{{ route('admin.schedule.destroy', $s->id) }}" method="GET">
                                <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                                <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    @endcan

                </tr>
            @empty
                <tr>
                    <td colspan="7" align="center">
                        <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>
    @can('PANITIA_UPDATE_PROPOSAL')
        <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#susunanModal"><i class="fas fa-plus"></i>
            Susunan Acara</a>
        @include('proposal.modal.susunanModal')
    @endcan
</div>
