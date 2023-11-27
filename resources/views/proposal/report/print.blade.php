<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome-animation.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <title>Print Proposal | {{ ucwords($proposals->name) }}</title>
    <style>
        @page {
            @bottom-right {
                content: "Page " counter(page);
            }
        }

        body {
            font-family: "Times New Roman", Times, serif;
        }

        .center {
            text-align: center;
        }

        p {
            text-align: justify;
        }

        thead {
            display: table-row-group;
        }

        hr {
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: dashed;
            border-width: 2px;
        }

        @media print {
            .pagebreak {
                clear: both;
                page-break-after: always;
            }
        }
    </style>
    <script type="text/javascript">
        window.onload = window.print();
    </script>
</head>

<body>
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.js') }}"></script>
    <div class="container-fluid style="padding: 3em">
        {{-- COVER PAGE --}}
        <div class="row pagebreak">
            <div class="col-md-12">
                <h1 class="center">
                    <strong>Proposal</strong>
                </h1>
                <h2 class="center">{{ ucwords($proposals->name) }}</h2>
                <br>
                <br>
                <h3 class="center">{{ \Carbon\Carbon::parse($proposals->tanggal)->format('j F Y') }}</h3>
                <br>
            </div>
            <div class="col-md-12">
                <p style="text-align:center; margin-top: 25%"><img src="{{ asset('images/CAP LPKIA.png') }}"
                        alt="LPKIA logo" height="200px"></p>

            </div>
            <div class="col-md-12" style="margin-top: 38%">
                <h1 class="center">
                    <strong>Institut Digital Ekonomi LPKIA</strong>
                </h1>
                <h1 class="center">
                    <strong>{{ date('Y') }}</strong>
                </h1>
            </div>
        </div>
        {{-- END OF COVER PAGE --}}
        {{-- ISI PROPOSAL --}}
        <div class="row pagebreak">
            <div class="col-md-12">
                <h4>
                    <strong>
                        I. LATAR BELAKANG
                    </strong>
                </h4>
                <p>
                    {!! $proposals->latar_belakang !!}
                </p>
                <h4>
                    <strong>
                        II. NAMA DAN TEMA
                    </strong>
                </h4>
                <table>
                    <tbody>
                        <tr>
                            <td>
                                Nama Kegiatan :
                            </td>
                            <td>
                                <strong>{{ $proposals->name }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tema Kegiatan :
                            </td>
                            <td>
                                <strong>{{ $proposals->tema_kegiatan }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <h4>
                    <strong>
                        III. BENTUK KEGIATAN
                    </strong>
                </h4>
                <p>
                    {{ $proposals->event->name }}
                </p>
                <h4>
                    <strong>IV. TUJUAN KEGIATAN</strong>
                </h4>
                {!! $proposals->tujuan_kegiatan !!}
                <h4 style="margin-top: 0.5em">
                    <strong>V. PESERTA KEGIATAN</strong>
                </h4>
                <div class="row">
                    @php
                        $indexC = 0;
                        $indexBR = 0;
                        $indexBE = 0;
                        $indexPS = 0;
                        $indexS = 0;
                        $indexP = 0;
                        $indexAPP = 0;
                    @endphp
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tipe Peserta</th>
                                        <th>Total Peserta</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($participants as $p)
                                        <tr>
                                            <td>{{ ++$indexP }}</td>
                                            <td>{{ $p->participantType->name }}</td>
                                            <td>{{ $p->participant_total }}</td>
                                            <td>{{ $p->notes }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <p>
                                <strong>Total Peserta: </strong><br>
                                {{ $sum_participants }} orang
                            </p>
                        </div>
                    </div>
                    <h4>
                        <strong>VI. SUSUNAN KEPANITIAAN</strong>
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Posisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($committee as $c)
                                        <tr class="">
                                            <td>{{ ++$indexC }}</td>
                                            <td>{{ $c->user->name }}</td>
                                            <td>{{ $c->position }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <p>
                                <strong>
                                    Total Kebutuhan Panitia:
                                </strong><br />
                                {{ $sum_committee }} orang
                            </p>
                        </div>
                    </div>
                    <h4>
                        <strong>VII. WAKTU DAN TEMPAT PELAKSANAAN</strong>
                    </h4>
                    <div class="col-md-12">
                        <table>
                            <tbody>
                                <tr>
                                    <td>
                                        Hari :
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($proposals->tanggal)->format('l') }} s/d
                                        {{ \Carbon\Carbon::parse($proposals->tanggal_selesai)->format('l') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tanggal :
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($proposals->tanggal)->format('j F Y') }} s/d
                                        {{ \Carbon\Carbon::parse($proposals->tanggal_selesai)->format('j F Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Tempat :
                                    </td>
                                    <td>
                                        {{ $proposals->place->name }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <h4 style="margin-top: 0.5em">
                        <strong>VIII. JADWAL KEGIATAN ACARA</strong>
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Kegiatan</th>
                                        <th>PIC</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($schedule as $s)
                                        <tr>
                                            <td>{{ ++$indexS }}</td>
                                            <td>{{ $s->kegiatan }}</td>
                                            <td>{{ $s->user->name }}</td>
                                            <td>{{ date('j F Y', strtotime($s->times)) }}</td>
                                            <td>{{ date('j F Y', strtotime($s->end_time)) }}</td>
                                            <td>{{ $s->notes }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h4 style="margin-top: 0.5em">
                        <strong>IX. JADWAL PERENCANAAN</strong>
                    </h4>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Perencanaan</th>
                                        <th>PIC</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Notes</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($planning_schedule as $ps)
                                        <tr>
                                            <td>{{ ++$indexPS }}</td>
                                            <td>{{ $ps->kegiatan }}</td>
                                            <td>{{ $ps->user->name }}</td>
                                            <td>{{ date('j F Y', strtotime($ps->date)) }}</td>
                                            <td>{{ date('j F Y', strtotime($ps->end_date)) }}</td>
                                            <td>{{ $ps->notes }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h4 style="margin-top: 0.5em">
                        <strong>X. ANGGARAN DANA</strong>
                    </h4>
                    <div class="col-md-12">
                        <h3>Rincian Penerimaan Anggaran</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anggaran</th>
                                        <th>Tipe Anggaran</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($budget_receipt as $br)
                                        <tr>
                                            <td>{{ ++$indexBR }}</td>
                                            <td>{{ $br->name }}</td>
                                            <td>{{ $br->type_anggaran->name }}</td>
                                            <td>{{ $br->qty }}</td>
                                            <td><span>Rp. </span> <span class="uang">{{ $br->price }}</span></td>
                                            <td><span>Rp. </span> <span class="uang">{{ $br->total }}</span></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <p>
                                <strong>Total Penerimaan Anggaran: </strong>
                            </p>
                            <span>Rp. </span><span class="uang">{{ $sum_budget_receipt }}</span>
                        </div>
                    </div>
                    {{-- END OF PENERIMAAN ANGGARAN --}}
                    {{-- PENGELUARAN ANGGARAN --}}
                    <div class="col-md-12">
                        <h3>Rincian Pengeluaran Anggaran</h3>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Anggaran</th>
                                        <th>Tipe Anggaran</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($budget_expenditure as $be)
                                        <tr>
                                            <td>{{ ++$indexBE }}</td>
                                            <td>{{ $be->name }}</td>
                                            <td>{{ $be->type_anggaran->name }}</td>
                                            <td>{{ $be->qty }}</td>
                                            <td><span>Rp. </span> <span class="uang">{{ $be->price }}</span></td>
                                            <td><span>Rp. </span> <span class="uang">{{ $be->total }}</span></td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <p>
                                <strong>Total Pengeluaran Anggaran:</strong>
                            </p>
                            <span>Rp. </span><span class="uang">{{ $sum_budget_expenditure }}</span>
                        </div>
                        <hr>
                        <h5>Selisih (Penerimaan - Pengeluaran Anggaran)</h5>
                        @php
                            $selisih = $sum_budget_receipt - $sum_budget_expenditure;
                        @endphp
                        @if ($selisih < 0)
                            Rp. <span class="uang">{{ $selisih }}</span> <i class="fas fa-arrow-down"></i>
                        @else
                            Rp. <span class="uang">{{ $selisih }}</span> <i class="fas fa-arrow-up"></i>
                        @endif
                        <hr>
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF ISI PROPOSAL --}}
    </div>
    {{-- SUSUNAN KEPANITIAAN --}}
    <div class="container-fluid" style="padding: 1em">
        {{-- DISAHKAN --}}
        <div class="row">
            <h4 style="margin-top: 0.5em">
                <strong>XI. LEMBAR PENGESAHAN</strong>
            </h4>
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-primary">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Disahkan oleh</th>
                                <th>Posisi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($approvals as $app)
                                <tr>
                                    <td>{{ ++$indexAPP }}</td>
                                    <td>{{ $app->user->name }}</td>
                                    <td>
                                        @if ($app->name == 'REKTOR')
                                            WK. REKTOR
                                        @else
                                            {{ $app->name }}
                                        @endif
                                    </td>
                                    <td>{{ $app->updated_at }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
            {{-- END OF DISAHKAN --}}
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {

            // Format mata uang.
            $('.uang').mask('000,000,000', {
                reverse: true
            });

        })
    </script>
    <footer>
        <i style="font-size: 8pt">
            Proposal dibuat pada: {{ $proposals->created_at }} &
            Proposal terakhir diperbaharui pada: {{ $proposals->updated_at }}
        </i>
    </footer>
</body>


</html>
