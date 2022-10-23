<table class="table table-striped">
    <thead>
        <tr>
            <th>Nama Panitia</th>
            <th>Posisi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr>
                <td scope="row">{{ ++$indexCommittee }}. {{ $c->user->name }}</td>
                <td>{{ $c->position }}</td>
            </tr>
        @endforeach     
        <tr>
            <td colspan="2"><strong>Total Kebutuhan Panitia:</strong></td>
            <td><strong><span>{{ $panitiaCount }}</span><span> orang</span></strong>
            </td>
        </tr>                                       
    </tbody>
</table>