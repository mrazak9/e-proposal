@extends('auth.emails.layout')
@section('template_title')
    Pengajuan Dana Rutin Baru
@endsection

@section('contents')
    <p>Dear, <strong>Ayu Sulistiawati, M.M</strong>
        <br> di <br>
        <strong>Biro Administrasi Sumber Daya</strong>
    </p>
    <br>
    <p>Terdapat pengajuan Dana Rutin Baru dari <strong>{{ $dop->organization->name }}</strong> pada tanggal dan waktu
        {{ $dop->created_at }}.</p>
    <p>Silakan lakukan verifikasi dan persetujuan pengajuan dana rutin ini.</p>
    <p>
        <a href="{{ route('admin.dop.process') }}" class="button green">Klik Disini</a>
    </p>
    <br>
@endsection
