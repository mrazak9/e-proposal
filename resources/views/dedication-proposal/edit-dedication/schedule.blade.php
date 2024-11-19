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
            @php
                $iyear_at = 0;
                $ievent_name = 0;
                $cBx1 = 0;
                $cBx2 = 0;
                $cBx3 = 0;
                $cBx4 = 0;
                $cBx5 = 0;
                $cBx6 = 0;
                $cBx7 = 0;
                $cBx8 = 0;
                $cBx9 = 0;
                $cBx10 = 0;
                $cBx11 = 0;
                $cBx12 = 0;
            @endphp           
            @foreach ($dedicationProposal->dedicationProposalsSchedule as $key => $schedule)
                <tr>
                    <td><input class="form-control" type="number" name="year_at[{{ ++$iyear_at }}]" value="{{ $schedule->year_at }}"
                            required></td>
                    <td><input class="form-control" type="text" name="event_name[{{ ++$ievent_name }}]"
                            value="{{ $schedule->event_name }}" required></td>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="1[{{ ++$cBx1 }}]"
                                {{ $schedule->{'1'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="2[{{ ++$cBx2 }}]"
                                {{ $schedule->{'2'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="3[{{ ++$cBx3 }}]"
                                {{ $schedule->{'3'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="4[{{ ++$cBx4 }}]"
                                {{ $schedule->{'4'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="5[{{ ++$cBx5 }}]"
                                {{ $schedule->{'5'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">5</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="6[{{ ++$cBx6 }}]"
                                {{ $schedule->{'6'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">6</label>
                        </div>
                        <br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="7[{{ ++$cBx7 }}]"
                                {{ $schedule->{'7'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">7</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="8[{{ ++$cBx8 }}]"
                                {{ $schedule->{'8'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">8</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="9[{{ ++$cBx9 }}]"
                                {{ $schedule->{'9'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">9</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="10[{{ ++$cBx10 }}]"
                                {{ $schedule->{'10'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">10</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="11[{{ ++$cBx11 }}]"
                                {{ $schedule->{'11'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">11</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="12[{{ ++$cBx12 }}]"
                                {{ $schedule->{'12'} ? 'checked' : '' }} value="1">
                            <label class="form-check-label">12</label>
                        </div>
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
                    <button type="button" class="btn btn-success w-100" onclick="addRowSchedule()">
                        <i class="fas fa-plus-circle"></i> Tambah Jadwal
                    </button>
                </td>
            </tr>
        </tfoot>
    </table>
</div>
