@extends('layouts.dashboard')

@section('template_title')
    Buat Pengajuan Penelitian Baru
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <h2><i class="fas fa-pencil-alt text-success"></i> Buat Pengajuan Penelitian Baru</h2>
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.research-proposals.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('research-proposal.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function addRow() {
            const table = document.getElementById('budgetTable').getElementsByTagName('tbody')[0];
            const rowCount = table.rows.length;
            const row = table.insertRow(rowCount);

            row.innerHTML = `
            <td>${rowCount + 1}</td>
            <td><input type="text" class="form-control" name="namaAnggaran[]"></td>
            <td><input type="number" class="form-control" name="kuantitas[]"></td>
            <td><input type="number" class="form-control" name="harga[]"></td>
            <td><input type="text" class="form-control" name="linkLampiran[]"></td>
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
