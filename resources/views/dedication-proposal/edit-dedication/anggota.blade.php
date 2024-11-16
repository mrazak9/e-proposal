<div class="table-responsive">
    <table class="table table-responsive" id="memberTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Nomor Identitas <br>(NIDK/NIDN/NIP/NIM)</th>
                <th>Afiliasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="vertical-align: middle">
            @php
                $iMember = 0;
            @endphp
            @foreach ($researchProposal->researchProposalsMember as $member)
                <tr>
                    <td>{{ ++$iMember }}</td>
                    <td>
                        <input type="text" class="form-control" name="name[]" value="{{ $member->name }}">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="identity_number[]" value="{{ $member->identity_number }}">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="affiliation[]" value="{{ $member->affiliation }}">
                    </td>
                    <td>
                        <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-success w-100" onclick="addRow()">
                        <i class="fas fa-plus-circle"></i> Tambah Anggota
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
