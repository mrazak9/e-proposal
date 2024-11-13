@extends('layouts.dashboard')

@section('template_title')
    Perbarui Pengajuan Penelitian | {{ $researchProposal->title ?? '' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <form method="POST" action="{{ route('admin.research-proposals.update', $researchProposal->id) }}" role="form"
            enctype="multipart/form-data">
            {{ method_field('PATCH') }}
            @csrf
            <div class="row">
                <div class="col-md-12">
                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">
                                <h3><i class="fas fa-pencil-alt text-success"></i> Perbarui Pengajuan Penelitian |
                                    {{ $researchProposal->title ?? '' }}</h3>
                            </span>
                        </div>
                        <div class="card-body">
                            @include('research-proposal.form')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="member-tab" data-bs-toggle="tab"
                                                data-bs-target="#member" type="button" role="tab"
                                                aria-controls="member" aria-selected="true">
                                                <i class="fas fa-users"></i> Anggota
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail" type="button" role="tab"
                                                aria-controls="detail" aria-selected="false">
                                                <i class="fas fa-newspaper"></i> Proposal
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="schedule-tab" data-bs-toggle="tab"
                                                data-bs-target="#schedule" type="button" role="tab"
                                                aria-controls="schedule" aria-selected="false">
                                                <i class="fas fa-calendar-check"></i> Jadwal
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="member" role="tabpanel"
                                            aria-labelledby="member-tab">
                                            @include('research-proposal.edit-research.anggota')
                                        </div>
                                        <div class="tab-pane" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                            @include('research-proposal.edit-research.detail')
                                        </div>
                                        <div class="tab-pane" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                                            @include('research-proposal.edit-research.schedule')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                Submit</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </form>
    </section>
@endsection
@section('scripts')
    <script>
        function addRow() {
            const table = document.getElementById('memberTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const nameCount = table.rows.length;
            const identifyCount = table.rows.length;
            const affiliationCount = table.rows.length;
            const row = table.insertRow(rowCount);

            row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" class="form-control" name="name[]"></td>
            <td><input type="number" class="form-control" name="identity_number[]"></td>            
            <td><input type="text" class="form-control" name="affiliation[]"></td>
            <td><button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>
        `;
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Re-index row numbers
            const table = document.getElementById('memberTable').getElementsByTagName('tbody')[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].innerHTML = i + 1;
            }
        }

        function addRowSchedule() {
            const tableSchedule = document.getElementById('scheduleTable').getElementsByTagName('tbody')[0];
            const rowCount = tableSchedule.rows.length;
            const yearAtCount = tableSchedule.rows.length;
            const eventNameCount = tableSchedule.rows.length;
            const c1Count = tableSchedule.rows.length;
            const c2Count = tableSchedule.rows.length;
            const c3Count = tableSchedule.rows.length;
            const c4Count = tableSchedule.rows.length;
            const c5Count = tableSchedule.rows.length;
            const c6Count = tableSchedule.rows.length;
            const c7Count = tableSchedule.rows.length;
            const c8Count = tableSchedule.rows.length;
            const c9Count = tableSchedule.rows.length;
            const c10Count = tableSchedule.rows.length;
            const c11Count = tableSchedule.rows.length;
            const c12Count = tableSchedule.rows.length;
            const row = tableSchedule.insertRow(rowCount);

            row.innerHTML = `
            <td><input class="form-control" type="number" name="year_at[]" required></td>
                <td><input class="form-control" type="text" name="event_name[]" required></td>
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="1[${c1Count+1}]" value="1">
                        <label class="form-check-label">1</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="2[${c2Count+1}]" value="1">
                        <label class="form-check-label">2</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="3[${c3Count+1}]" value="1">
                        <label class="form-check-label">3</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="4[${c4Count+1}]" value="1">
                        <label class="form-check-label">4</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="5[${c5Count+1}]" value="1">
                        <label class="form-check-label">5</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="6[${c6Count+1}]" value="1">
                        <label class="form-check-label">6</label>
                    </div>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="7[${c7Count+1}]" value="1">
                        <label class="form-check-label">7</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="8[${c8Count+1}]" value="1">
                        <label class="form-check-label">8</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="9[${c9Count+1}]" value="1">
                        <label class="form-check-label">9</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="10[${c10Count+1}]" value="1">
                        <label class="form-check-label">10</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="11[${c11Count+1}]" value="1">
                        <label class="form-check-label">11</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="12[${c12Count+1}]" value="1">
                        <label class="form-check-label">12</label>
                    </div>
                </td>
                <td>
                    <button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
        `;
        }

        function deleteRowSchedule(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Re-index row numbers
            const tableSchedule = document.getElementById('scheduleTable').getElementsByTagName('tbody')[0];
            for (let i = 0; i < tableSchedule.rows.length; i++) {
                tableSchedule.rows[i].cells[0].innerHTML = i + 1;
            }
        }
        document.getElementById('tags').addEventListener('input', function(e) {
            const input = e.target;
            let tags = input.value;

            // Cek jika karakter terakhir adalah spasi, menandakan akhir tag
            if (tags.endsWith(' ')) {
                // Pisahkan tags yang sudah ada dan hitung jumlahnya
                const tagArray = tags.split(',').map(tag => tag.trim()).filter(tag => tag.length > 0);

                // Batasi hanya sampai 5 tag
                if (tagArray.length > 5) {
                    tags = tagArray.slice(0, 5).join(', ') + ', ';
                } else {
                    // Tambahkan koma dan spasi jika kurang dari 5 tag
                    tags = tags.trim() + ', ';
                }

                input.value = tags;
            }
        });
    </script>
@endsection
