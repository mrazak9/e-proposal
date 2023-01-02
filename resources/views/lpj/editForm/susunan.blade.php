<div class="table-responsive">
    <table class="table table-hover table-borderless">
        <thead class="thead-inverse">
            <tr>
                <th>Nama Kegiatan</th>
                <th>PIC</th>
                <th>Tanggal</th>
                <th>Waktu Mulai</th>
                <th>Waktu Selesai</th>
                <th>Notes</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexSchedule = 0)
            @forelse ($schedule as $s)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.storesusunan', $s->id) }}" method="POST">
                        @csrf
                        <td>
                            <textarea class="form-control" cols="30" rows="3" readonly>{{ ++$indexSchedule }}. {{ $s->kegiatan }}</textarea>
                            <input type="hidden" name="kegiatan" value="{{ $s->kegiatan }}">
                        </td>
                        <td><select class="form-control" name="user_id">
                                <option value="{{ $s->user_id }}" selected>{{ $s->user->name }}</option>
                                @foreach ($student as $value)
                                    <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                                @endforeach
                            </select></td>
                        <td>
                            <input type="date" class="form-control" name="date" placeholder="Waktu Acara"
                                maxlength="10" value="{{ $s->date }}">
                        </td>
                        <td>
                            <input type="time" class="form-control" name="start_time" placeholder="Waktu Acara"
                                maxlength="10" value="{{ $s->times }}">
                        </td>
                        <td>
                            <input type="time" class="form-control" name="end_time" placeholder="Waktu Acara"
                                maxlength="10" value="{{ $s->end_time }}">
                        </td>
                        <td>
                            <textarea name='notes' class="form-control" maxlength="30" rows="3" cols="30">{{ $s->notes }}</textarea>
                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td>
                                <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                        name="lpj_id">
                                    <button type="submit" class="btn btn-success btn-sm"><i
                                            class="fas fa-check"></i></button></span>
                            </td>
                        @endcan
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="4" align="center">
                        <span class="badge bg-danger text-white">Belum ada data Susunan Acara, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
