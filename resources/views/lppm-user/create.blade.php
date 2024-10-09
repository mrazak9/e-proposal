@extends('layouts.dashboard')

@section('template_title')
    Perbarui Data Pengguna
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">
                            <i class="fas fa-check-circle text-success"></i> Perbarui Data Pengguna
                        </span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.lppm-users.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf

                            @include('lppm-user.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        document.getElementById('handphone').addEventListener('input', function(e) {
            let value = e.target.value;
            if (!value.startsWith('+62')) {
                e.target.value = '+62' + value.replace(/^\+62/, '');
            }
        });
    </script>
@endsection
