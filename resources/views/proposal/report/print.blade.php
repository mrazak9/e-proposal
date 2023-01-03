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
                content: "Page "counter(page);
            }
        }

        h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
        }

        h3 {
            text-align: center;
        }

        h4 {
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
    </style>
    <script type="text/javascript">
        window.onload = window.print();
    </script>
</head>

<body>
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.js') }}"></script>
    <div class="container-fluid" style="padding: 3em">
        {{-- COVER PAGE --}}
        <div class="row">
            <div class="col-md-12">
                <h1>Institut Digital Ekonomi</h1>
                <h1>LPKIA</h1>
                <br>
                <br>
                <h3>{{ ucwords($proposals->name) }}</h3>
                <br>
                <h3>disusun <br />oleh</h3>
                <h3>{{ $proposals->org_name }}</h3>
            </div>
            <div class="col-md-12">
                <p style="text-align:center; filter: grayscale(100%); margin-top: 25%"><img
                        src="{{ asset('images/CAP LPKIA.png') }}" alt="LPKIA logo" height="100px"></p>

            </div>
            <div class="col-md-12" style="margin-top: 38%">
                <h4>Jalan Soekarno Hatta No. 456</h4>
                <h4>Bandung 40266, Jawa Barat</h4>
                <h4><i class="fas fa-phone"></i> 022-7564283 / 7564284</h4>
            </div>
        </div>
        {{-- END OF COVER PAGE --}}
        {{-- ISI PROPOSAL --}}
        <div class="row">
            <div class="col-md-12">
                <strong>Nama Kegiatan</strong>
                <p>{{ $proposals->name }}</p>
                <strong>Jenis Kegiatan</strong>
                <p>{{ $proposals->event->name }}</p>
                <strong>Latar Belakang</strong>
                <p>{{ $proposals->latar_belakang }}</p>
                <strong>Tema Kegiatan</strong>
                <p>{{ $proposals->tema_kegiatan }}</p>
                <strong>Tujuan Kegiatan</strong>
                <p>{{ $proposals->tujuan_kegiatan }}</p>
                <strong>Tempat Kegiatan</strong>
                <p>{{ $proposals->place->name }}</p>
                <strong>Tanggal Mulai s/d Selesai Kegiatan</strong>
                <p>{{ date('j F Y', strtotime($proposals->tanggal)) }} s/d
                    {{ date('j F Y', strtotime($proposals->tanggal_selesai)) }}</p>
            </div>
        </div>
        {{-- END OF ISI PROPOSAL --}}
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    {{-- SUSUNAN KEPANITIAAN --}}
    <div class="container-fluid" style="padding: 1em">
        @php
            $indexC = 0;
            $indexBR = 0;
            $indexBE = 0;
            $indexPS = 0;
            $indexS = 0;
            $indexP = 0;
        @endphp
        <div class="row">
            <div class="col-md-12">
                <h2>Rincian Proposal</h2>
                <br>
                <h3>Rincian Kepanitiaan</h3>
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
                </div>
            </div>
            {{-- END OF SUSUNAN KEPANITIAAN --}}
            {{-- PENERIMAAN ANGGARAN --}}
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
                    <p>Total Penerimaan Anggaran: </p>
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
                    <p>Total Pengeluaran Anggaran: </p>
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
            {{-- END OF PENGELUARAN ANGGARAN --}}
            {{-- JADWAL PERENCANAAN --}}
            <div class="col-md-12">
                <h3>Rincian Jadwal Perencanaan</h3>
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
            {{-- END OF JADWAL PERENCANAAN --}}
            {{-- SUSUNAN ACARA --}}
            <div class="col-md-12">
                <h3>Rincian Susunan Acara</h3>
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
            {{-- END OF SUSUNAN ACARA --}}
            {{-- PARTISIPAN --}}
            <div class="col-md-12">
                <h3>Rincian Peserta</h3>
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
                    <p>Total Peserta: {{ $sum_participants }}</p>
                </div>
            </div>
            {{-- END OF PARTISIPAN --}}
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
