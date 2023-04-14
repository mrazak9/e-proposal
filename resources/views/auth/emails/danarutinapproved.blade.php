@extends('auth.emails.layout')
@section('template_title')
    Pengajuan Dana Rutin - Disetujui
@endsection
@section('contents')
    <p>Dear, <strong>{{ $dop->organization->name }}</strong>
        <br> di <br>
        <strong>Tempat</strong>
    </p>
    <br>
    <p>Pengajuan Dana Rutin yang diajukan pada tanggal dan waktu
        {{ $dop->created_at }} telah <strong>disetujui</strong></p>
    <p>Silakan lakukan pengambilan dana rutin ini.</p>
    <p>Dan pastikan hanya <strong>Bendahara</strong> yang bisa lakukan pengambilan Dana Rutin ini. Tidak bisa
        diwakilkan</p>
    <p>
        <a href="{{ route('admin.dops.index') }}" class="button green">Klik Disini</a>
    </p>
    <br>
@endsection
