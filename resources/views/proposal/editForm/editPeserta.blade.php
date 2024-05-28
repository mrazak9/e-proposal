<div class="table-responsive">
    <table class="table table-hover table-borderless table-sm">
        <thead class="thead-inverse">
            <tr>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <th>Aksi</th>
                @endcan
                <th>#</th>
                <th>Tipe Peserta</th>
                <th>Total Peserta</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody>
            @php($indexPeserta = 0)
            @forelse ($participants as $p)
                <tr class="align-middle">
                    @can('PANITIA_UPDATE_PROPOSAL')
                        <td>
                            <a class="btn btn-danger btn-sm" href="{{ route('admin.participant.destroy', $p->id) }}"
                                onclick="return confirm('Yakin untuk menghapus ini?');">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    @endcan
                    <form action="{{ route('admin.participant.update') }}" method="POST">
                        @csrf
                        <td scope="row">{{ ++$indexPeserta }}</td>
                        <td>
                            <input type="hidden" name="p_id[]" value="{{ $p->id }}">
                            <select class="form-control" name="participant_type_id[]" required>
                                <option value="{{ $p->participant_type_id }}" selected>{{ $p->participantType->name }}
                                </option>
                                @foreach ($participantType as $value => $key)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td><input type="number" class="form-control" min="0" name="participant_total[]"
                                value="{{ $p->participant_total }}">
                        </td>
                        <td>
                            <textarea class="form-control" name="notes[]" maxlength="30" rows="3" cols="30">{{ $p->notes }}</textarea>
                        </td>
                </tr>
            @empty
                <tr align="center">
                    <td colspan="6">
                        <span class="badge bg-danger text-white">Belum ada data Peserta, silahkan lengkapi dahulu</span>
                    </td>
                </tr>

            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan="2"><strong>Total Peserta:</strong></td>
                <td colspan="3"><strong><span class="uang">{{ $sum_participants }}</span><span>
                            orang</span></strong>
                </td>
            </tr>
            <tr>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <td colspan="5"><span class="align-middle">
                            <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                            <button type="submit" class="btn btn-primary btn-sm w-100">
                                Update Semua Peserta
                            </button>
                            </form>
                    </td>
                @endcan
            </tr>
            <tr>
                @can('PANITIA_UPDATE_PROPOSAL')
                    <td colspan="6">
                        <a class="btn btn-sm btn-success w-100" data-bs-toggle="modal" data-bs-target="#pesertaModal"><i
                                class="fas fa-plus"></i>
                            Peserta</a>
                        @include('proposal.modal.pesertaModal')
                    </td>
                @endcan
            </tr>
        </tfoot>
    </table>
</div>
