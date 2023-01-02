<div class="table-responsive">
    <table class="table table-hover table-borderless">
        <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>Tipe Peserta</th>
                <th>Total Peserta</th>
                <th>Notes</th>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @php($indexPeserta = 0)
            @forelse ($participants as $p)
                <tr class="align-middle">
                    <form action="{{ route('admin.lpj.storepeserta', $p->id) }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexPeserta }}</td>
                        <td><select class="form-control" name="participant_type_id" required>
                                <option value="{{ $p->participant_type_id }}" selected>{{ $p->participantType->name }}
                                </option>
                                @foreach ($participantType as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select></td>
                        <td><input type="number" class="form-control" min="0" name="participant_total"
                                value="{{ $p->participant_total }}">
                        </td>
                        <td>
                            <input type="text" class="form-control" name="participant_notes"
                                value="{{ $p->notes }}">
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
                <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
            @endforelse
            <tr class="table table-secondary">
                <td colspan="2"><strong>Total Peserta:</strong></td>
                <td><strong><span class="uang">{{ $sum_participants }}</span><span> orang</span></strong>
                </td>
            </tr>
        </tbody>
    </table>
</div>
