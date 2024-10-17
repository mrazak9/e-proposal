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
                            <span class="card-title">
                                <h2><i class="fas fa-user-plus text-info"></i> Tambah Anggota Penelitian</h2>
                            </span>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table table-responsive" id="budgetTable">
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
            const table = document.getElementById('budgetTable').getElementsByTagName('tbody')[0];
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
