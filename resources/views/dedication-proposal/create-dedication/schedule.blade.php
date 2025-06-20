<div class="table-responsive">
    <table class="table table-responsive" id="scheduleTable">
        <thead>
            <tr>
                <th>Tahun Ke-</th>
                <th>Nama Kegiatan</th>
                <th colspan="12">Bulan Pelaksanaan</th>
            </tr>
        </thead>
        <tbody style="vertical-align: middle">
            <tr>
                <td><input class="form-control" type="number" name="year_at[0]" required></td>
                <td><input class="form-control" type="text" name="event_name[0]" required></td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="1[0]" value="1">
                        <label class="form-check-label">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="2[0]" value="1">
                        <label class="form-check-label">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="3[0]" value="1">
                        <label class="form-check-label">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="4[0]" value="1">
                        <label class="form-check-label">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="5[0]" value="1">
                        <label class="form-check-label">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="6[0]" value="1">
                        <label class="form-check-label">6</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="7[0]" value="1">
                        <label class="form-check-label">7</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="8[0]" value="1">
                        <label class="form-check-label">8</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="9[0]" value="1">
                        <label class="form-check-label">9</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="10[0]" value="1">
                        <label class="form-check-label">10</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="11[0]" value="1">
                        <label class="form-check-label">11</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="12[0]" value="1">
                        <label class="form-check-label">12</label>
                    </div>

                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6">
                    <button type="button" class="btn btn-success w-100" onclick="addRowSchedule()">
                        <i class="fas fa-plus-circle"></i> Tambah Jadwal
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
