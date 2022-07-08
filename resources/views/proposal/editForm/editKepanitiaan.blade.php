<table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Panitia</th>
            <th>Posisi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr>
                <td scope="row">{{ ++$indexCommittee }}</td>
                <td>
                    <select class="form-control" name="user_id">
                        <option selected value="{{ $c->user_id }}" disabled>{{ $c->user->name }}</option>
                        @foreach ($student as $value => $key)
                            <option value="{{ $value }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </td>
                <td><select class="form-control" name="position">
                        <option selected value="{{ $c->position }}" disabled>{{ $c->position }}</option>
                        <option value="Ketua Pelaksana">Ketua Pelaksana</option>
                        <option value="Sekretaris">Sekretaris</option>
                        <option value="Bendahara">Bendahara</option>
                        <option value="Wakil Ketua">Sekretaris</option>
                    </select></td>
                <td>
                    <form action="{{ route('admin.proposal.destroy_committee', $proposal->id) }}" method="POST">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{ route('admin.proposal.edit_committe',$proposal->id) }}" class="btn btn-warning"><i class="bi bi-pencil"></i></a>
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </div>
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
