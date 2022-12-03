<table class="table table-striped" id="kepanitiaan">
    <thead>
        <tr>
            <th>#</th>
            <th onclick="sortTablePanitia(1)">Nama Panitia <i class="fas fa-sort text-primary"></i></th>
            <th onclick="sortTablePanitia(2)">Posisi <i class="fas fa-sort text-primary"></i></th>
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
