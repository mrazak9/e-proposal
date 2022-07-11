<table class="table table-striped">
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
                            @foreach ($student as $value => $key)
                                <option value="{{ $value }}">{{ $key }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td><select class="form-control" name="position">
                            <option selected value="{{ $c->position }}">{{ $c->position }}</option>
                            <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                            <option value="Sekretaris">Sekretaris</option>
                            <option value="Bendahara">Bendahara</option>
                            <option value="Wakil Ketua">Sekretaris</option>
                        </select>
                    </td>
                    <td><span class="align-middle"><input type="hidden" value="{{ $proposal->id }}" name="proposal_id">
                        <button type="submit" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></button></span>
                    </td>
                </form>
                <td>
                    <form action="{{ route('admin.committee.destroy', $c->id) }}" method="GET">
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

<a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kepanitiaanModal">Add Kepanitiaan</a>
@include('proposal.modal.kepanitiaanModal')
