<table class="table table-striped sortable" id="kepanitiaan">
    <thead>
        <tr>
            <th style="width: 5%">#</th>
            <th style="width: 60%">Nama Panitia</th>
            <th style="width: 35%">Posisi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr>
                <td>{{ ++$indexCommittee }}</td>
                <td>
                    <textarea class="form-control" cols="10" rows="3" disabled>{{ $c->user->name }}
                    </textarea>

                </td>
                <td>{{ $c->position }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>Total Kebutuhan Panitia: {{ $panitiaCount }} orang</strong>
</p>
