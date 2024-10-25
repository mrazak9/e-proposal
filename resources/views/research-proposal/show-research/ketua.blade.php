<div class="row">
    <div class="col-nd-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    <tr>
                        <th>NIDN/NIDK/NIP:</th>
                        <td>{{ $researchProposal->lppmUser->nidn }}</td>
                    </tr>
                    <tr>
                        <th>Nama Lengkap (tanpa gelar):</th>
                        <td>{{ $researchProposal->lppmUser->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Afiliasi/Institusi:</th>
                        <td>{{ $researchProposal->lppmUser->affiliation }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
