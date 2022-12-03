<table class="table table-striped sortable" id="kepanitiaan">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Panitia</th>
            <th>Posisi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr>
                <td>{{ ++$indexCommittee }}</td>
                <td scope="row">
                    {{ $c->user->name }}</td>
                <td>{{ $c->position }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<p><strong>Total Kebutuhan Panitia: {{ $panitiaCount }} orang</strong>
</p>
