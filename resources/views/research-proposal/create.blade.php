@extends('layouts.dashboard')

@section('template_title')
    Buat Pengajuan Penelitian Baru
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <form method="POST" action="{{ route('admin.research-proposals.store') }}">
                @csrf
                <div class="col-md-12">
                    @includeif('partials.errors')

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">
                                <h2><i class="fas fa-pencil-alt text-success"></i> Buat Pengajuan Penelitian Baru</h2>
                            </span>
                        </div>
                        <div class="card-body">
                            @include('research-proposal.form')
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="member-tab" data-bs-toggle="tab"
                                                data-bs-target="#member" type="button" role="tab" aria-controls="member"
                                                aria-selected="true">
                                                Anggota
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="detail-tab" data-bs-toggle="tab"
                                                data-bs-target="#detail" type="button" role="tab"
                                                aria-controls="detail" aria-selected="false">
                                                Proposal
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="schedule-tab" data-bs-toggle="tab"
                                                data-bs-target="#schedule" type="button" role="tab"
                                                aria-controls="schedule" aria-selected="false">
                                                Jadwal
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="member" role="tabpanel"
                                            aria-labelledby="member-tab">
                                            @include('research-proposal.create-research.anggota')
                                        </div>
                                        <div class="tab-pane" id="detail" role="tabpanel" aria-labelledby="detail-tab">
                                            @include('research-proposal.create-research.detail')
                                        </div>
                                        <div class="tab-pane" id="schedule" role="tabpanel" aria-labelledby="schedule-tab">
                                            Jadwal
                                        </div>
                                    </div>
                                    
                                    <div class="box-footer mt20">
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i>
                                            Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        </div>
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
            <td><input type="text" class="form-control" name="name[${nameCount}]"></td>
            <td><input type="number" class="form-control" name="identity_number[${identifyCount}]"></td>            
            <td><input type="text" class="form-control" name="affiliation[${affiliationCount}]"></td>
            <td><button type="button" class="btn btn-outline-danger" onclick="deleteRow(this)"><i class="fas fa-trash-alt"></i></button></td>
        `;
        }

        function deleteRow(button) {
            const row = button.parentNode.parentNode;
            row.parentNode.removeChild(row);

            // Re-index row numbers
            const table = document.getElementById('budgetTable').getElementsByTagName('tbody')[0];
            for (let i = 0; i < table.rows.length; i++) {
                table.rows[i].cells[0].innerHTML = i + 1;
            }
        }
    </script>
@endsection
