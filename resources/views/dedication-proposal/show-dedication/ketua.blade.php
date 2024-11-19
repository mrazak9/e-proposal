<div class="row">
    <div class="col-nd-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>NIDN/NIDK/NIP:</th>
                        <td>{{ $dedicationProposal->lppmUser->nidn }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap (tanpa gelar):</th>
                        <td>{{ $dedicationProposal->lppmUser->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Afiliasi/Institusi:</th>
                        <td>{{ $dedicationProposal->lppmUser->affiliation }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
