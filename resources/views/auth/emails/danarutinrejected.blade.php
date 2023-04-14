@extends('auth.emails.layout')
@section('template_title')
    Pengajuan Dana Rutin - Ditolak
@endsection

@section('contents')
    <p>Dear, <strong>{{ $dop->organization->name }}</strong>
        <br> di <br>
        <strong>Tempat</strong>
    </p>
    <br>
    <p>Pengajuan Dana Rutin yang diajukan pada tanggal dan waktu
        {{ $dop->created_at }} telah <strong>ditolak</strong></p>
    <p>Silahkan cek kolom revisi serta lakukan <strong>pengajuan ulang dan perbaiki</strong></p>
    <p>
        <a href="{{ route('admin.dops.index') }}" class="button green">Klik Disini</a>
    </p>
    <br>
@endsection
