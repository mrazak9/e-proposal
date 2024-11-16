<div class="table-responsive">
    <table class="table table-responsive" id="memberTable">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Lengkap</th>
                <th>Nomor Identitas <br>(NIDK/NIDN/NIP)</th>
                <th>Afiliasi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody style="vertical-align: middle">
            <tr>
                <td>1</td>
                <td>
                    <input type="text" class="form-control" name="name[0]">
                </td>
                <td>
                    <input type="number" class="form-control"
                        name="identity_number[0]">
                </td>
                <td>
                    <input type="text" class="form-control" name="affiliation[0]">
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger"
                        onclick="deleteRow(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-success w-100"
                        onclick="addRow()">
                        <i class="fas fa-plus-circle"></i> Tambah Anggota
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>