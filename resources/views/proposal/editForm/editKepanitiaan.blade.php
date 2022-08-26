<script>
    var msg = '{{ Session::get('alert_committe') }}';
    var exist = '{{ Session::has('alert_committe') }}';
    if (exist) {
        alert(msg);
    }
</script>
<table class="table table-hover table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Panitia</th>
            <th>Posisi</th>
            <th colspan="2">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr class="align-middle">
                <form action="{{ route('admin.committee.update', $c->id) }}" method="POST">
                    @csrf
                    <td scope="row">{{ ++$indexCommittee }}</td>
                    <td>
                        <select class="form-control" name="user_id">
                            <option selected value="{{ $c->user_id }}">{{ $c->user->name }}</option>
                            @foreach ($user as $value)
                                <option value="{{ $value->user_id }}">{{ $value->user->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="position">
                            <option selected value="{{ $c->position }}">{{ $c->position }}</option>
                            <option value="Acara">Acara</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                            <option value="Konsumsi">Konsumsi</option>
                            <option value="Logistik">Logistik</option>
                            <option value="Penanggung Jawab">Penanggung Jawab</option>
                            <option value="Publikasi dan Dokumentasi">Publikasi dan Dokumentasi</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Wakil Ketua">Wakil Ketua</option>
                        </select>
                    </td>
                    @can('CREATE_PROPOSAL')
                        <td><span class="align-middle"><input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}"
                                    name="proposal_id">
                                <button type="submit" class="btn btn-warning btn-sm"><i
                                        class="bi bi-pencil"></i></button></span>
                        </td>
                    </form>
                    <td>
                        <form action="{{ route('admin.committee.destroy', $c->id) }}" method="GET">
                            <input type="hidden" value="{{ Crypt::encrypt($proposal->id) }}" name="proposal_id">
                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                @endcan

            </tr>
        @endforeach
        <tr class="table table-secondary">
            <td><strong>Kebutuhan Panitia:</strong></td>
            <td colspan="2"><strong>{{ $panitiaCount }} orang</strong></td>
        </tr>
    </tbody>
</table>
@can('CREATE_PROPOSAL')
    <a class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#kepanitiaanModal"><i class="fas fa-plus"></i>
        Kepanitiaan</a>
    @include('proposal.modal.kepanitiaanModal')
@endcan
