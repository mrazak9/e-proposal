<table class="table table-info table-sm sortable rounded rounded-3 overflow-hidden" id="kepanitiaan">
    <thead>
        <tr>
            <th style="width: 5%"><i class="fas fa-hashtag"></i></th>
            <th style="width: 60%"><i class="fas fa-users"></i> Nama Panitia</th>
            <th style="width: 35%"><i class="fas fa-user-tag"></i> Posisi</th>
        </tr>
    </thead>
    <tbody>
        @php($indexCommittee = 0)
        @foreach ($committee as $c)
            <tr>
                <td align="center">{{ ++$indexCommittee }}</td>
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
