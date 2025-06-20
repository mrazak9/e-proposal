<div class="table-responsive">
    <table class="table table-hover table-borderless">
        <thead class="thead-inverse">
            <tr>
                <th>Nama Perencanaan</th>
                <th>PIC</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Notes</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexJadwal = 0)
            @forelse ($planning_schedule as $ps)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.storejadwalperencanaan', $ps->id) }}" method="POST">
                        @csrf
                        <td>
                            <input type="hidden" class="form-control" name="kegiatan" value="{{ $ps->kegiatan }}">
                            <textarea class="form-control" cols="30" rows="3" readonly>{{ ++$indexJadwal }}. {{ $ps->kegiatan }}</textarea>
                        </td>
                        <td>
                            <input type="hidden" name="user_id" value="{{ $ps->user_id }}">
                            <textarea class="form-control" cols="30" rows="3" readonly>{{ $ps->user->name }}</textarea>
                        </td>
                        <td>
                            <input type="date" class="form-control" name="start_date" placeholder="Tanggal Acara"
                                maxlength="10" value="{{ $ps->date }}">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="end_date" placeholder="Tanggal Acara"
                                maxlength="10" value="{{ $ps->end_date }}">
                        </td>
                        <td>
                            <textarea name='notes' class="form-control" maxlength="30" rows="3" cols="30">{{ $ps->notes }}</textarea>
                        </td>

                        </td>
                        @can('PANITIA_UPDATE_PROPOSAL')
                            <td>
                                <span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($lpj->id) }}"
                                        name="lpj_id">
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-check">
                                        </i>
                                    </button>
                                </span>
                            </td>
                        @endcan
                    </form>
                </tr>
            @empty
                <tr>
                    <td colspan="5" align="center">
                        <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
