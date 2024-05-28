<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead class="thead-inverse">
            <tr>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
                <th>#</th>
                <th>Nama <br>Perencanaan</th>
                <th>PIC</th>
                <th>Tanggal <br>Mulai</th>
                <th>Tanggal <br>Selesai</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @php($indexJadwal = 0)
            @forelse ($planning_schedule as $ps)
                <tr class="align-middle">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td>
                            <a href="{{ route('admin.planning.destroy', $ps->id) }}" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin untuk menghapus {{ $ps->kegiatan }}?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    @endcan
                    <form action="{{ route('admin.planning.update') }}" method="POST">
                        @csrf
                        <td>{{ ++$indexJadwal }}</td>
                        <td>
                            <input type="hidden" name="ps_id[]" value="{{ $ps->id }}">
                            <textarea name="kegiatan[]" class="form-control" cols="20" rows="3" required>{{ $ps->kegiatan }}</textarea>
                        <td><select class="form-control" name="user_id[]">
                                <option value="{{ $ps->user_id }}" selected>{{ $ps->user->name }}</option>
                                @foreach ($student as $value)
                                    <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                                @endforeach
                            </select></td>
                        <td>
                            <input type="date" class="form-control" name="date[]" placeholder="Tanggal Acara"
                                maxlength="10" value="{{ $ps->date }}">
                        </td>
                        <td>
                            <input type="date" class="form-control" name="end_date[]" placeholder="Tanggal Acara"
                                maxlength="10" value="{{ $ps->end_date }}">
                        </td>
                        <td>
                            <textarea name='notes[]' class="form-control" maxlength="100" rows="3">{{ $ps->notes }}</textarea>
                        </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6">
                        <span class="badge bg-danger text-white">Belum ada data Jadwal Perencanaan, silahkan lengkapi
                            dahulu</span>
                    </td>
                </tr>

            @endforelse
        </tbody>

        <tfoot>
            <tr>
                <td colspan="7">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                        <button type="submit" class="btn btn-primary btn-sm w-100">
                            Update Semua Jadwal Perencanaan</button>
                    </td>
                @endcan
                </form>
            </tr>
            <tr>
                <td colspan="7">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <a class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#jadwalModal"><i
                                class="fas fa-plus"></i>
                            Jadwal Perencanaan</a>
                        @include('proposal.modal.jadwalModal')
                    @endcan
                </td>
            </tr>
        </tfoot>
    </table>
</div>
