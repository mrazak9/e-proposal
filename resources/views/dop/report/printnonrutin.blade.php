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
    <title>Report Dana Non Rutin</title>
    <style>
        @page {
            @bottom-right {
                content: "Page " counter(page);
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

        h5 {
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

        hr.s1 {
            height: 9px;
            border-top: 2px solid black;
            border-bottom: 4px solid black;
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

    {{-- SUSUNAN KEPANITIAAN --}}
    <div class="container-fluid" style="padding: 1em">
        <div class="row pagebreak">
            <div class="col-md-12">
                <h3>LAPORAN PENGELUARAN DANA KEGIATAN KEMAHASISWAAN (NON RUTIN)
                    <br><br>Periode {{ request('startdate') }} s/d {{ request('enddate') }}
                </h3>
                <div class="table table-bordered">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Organisasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th>Tanggal Pencairan</th>
                                <th style="text-align: right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalNominal = 0;
                                $orgTotals = [];
                            @endphp
                            @forelse ($proposals as $proposal)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $proposal->org_name }}
                                    </td>
                                    <td>
                                        {{ \Carbon\Carbon::parse($proposal->created_at)->format('d-m-Y') }}
                                    </td>
                                    <td>
                                        {{ $proposal->event->name }}
                                    </td>
                                    <td>
                                        {{ $proposal->tanggal }} <br>
                                        {{ $proposal->tanggal_selesai }}
                                    </td>
                                    <td>
                                        @foreach ($proposal->receipt_of_fund as $tanggalPencairan)
                                            {{ $tanggalPencairan->tanggal }}
                                        @endforeach
                                    </td>
                                    <td align="right">
                                        @foreach ($proposal->receipt_of_fund as $receipt)
                                            {{ number_format($receipt->nominal) }},-
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5"></td>
                                    <td colspan="2" align="right">
                                        @php
                                            $orgTotal = 0;
                                        @endphp
                                        @foreach ($proposal->receipt_of_fund as $receipt)
                                            @php
                                                $totalNominal += $receipt->nominal;
                                                $orgTotal += $receipt->nominal;
                                            @endphp
                                        @endforeach
                                        <strong>Total: Rp. {{ number_format($orgTotal) }},-</strong>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <h5>
                                            <i class="fa fa-info-circle"></i> Belum ada Data Dana Non Rutin
                                        </h5>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5" style="text-align: right;"><strong>Subtotal:</strong></td>
                                <td colspan="2" align="right"><strong>Rp.
                                        {{ number_format($totalNominal) }},-</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
