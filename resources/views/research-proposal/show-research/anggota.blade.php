<div class="row">
    <div class="col-nd-12">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($researchProposal->researchProposalsMember as $member)
                        <tr>
                            <th>
                                <h4><i class="fas fa-user-graduate"></i> Identitas Anggota Peneliti {{ ++$i }}</h4>
                            </th>
                        </tr>
                        <tr>
                            <th>NIDN/NIDK/NIP/NIM:</th>
                            <td>{{ $member->identity_number }}</td>
                        </tr>
                        <tr>
                            <th>Nama Lengkap (tanpa gelar):</th>
                            <td>{{ $member->name }}</td>
                        </tr>
                        <tr>
                            <th>Afiliasi/Institusi:</th>
                            <td>{{ $member->affiliation }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <hr>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
