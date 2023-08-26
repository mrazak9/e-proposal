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
    <title>Report Rekapitulasi</title>
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
    {{-- SUSUNAN KEPANITIAAN --}}
    <div class="container-fluid" style="padding: 1em">
        <div class="row pagebreak">
            <div class="col-md-12">
                <h2>REKAPITULASI PENGELUARAN DANA KEMAHASISWAAN</h2>
                <br>
                <h3>Periode {{ request('startdate') }} s/d {{ request('enddate') }}</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Organisasi</th>
                                <th>Kegiatan</th>
                                <th>Tanggal Kegiatan</th>
                                <th style="text-align: right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="5">
                                    <strong>
                                        DANA RUTIN
                                    </strong>
                                </td>
                            </tr>
                            @php
                                $totalDanaRutin = 0;
                            @endphp
                            @foreach ($dops as $receiptFundsDop)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $receiptFundsDop->dop->organization->singkatan }}
                                    </td>
                                    <td>
                                        @foreach ($receiptFundsDop->dop->dop_transaction as $dop_category)
                                            {{ $dop_category->category }} <br>
                                        @endforeach
                                    </td>
                                    <td>
                                        -
                                    </td>
                                    <td>
                                        @php
                                            $totalDanaRutin += array_sum(array_column($receiptFundsDop->dop->dop_transaction->toArray(), 'amount'));
                                            $totalDanaRutinFormatted = number_format(array_sum(array_column($receiptFundsDop->dop->dop_transaction->toArray(), 'amount')), 2);
                                        @endphp
                                        Rp. {{ $totalDanaRutinFormatted }},-
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total Dana Rutin</strong></td>
                                <td><strong>Rp. {{ number_format($totalDanaRutin, 2) }},-</strong></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <strong>
                                        DANA NON RUTIN
                                    </strong>
                                </td>
                            </tr>
                            @php
                                $totalDanaNonRutin = 0;
                            @endphp
                            @foreach ($proposals as $proposal)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $proposal->org_name }}
                                    </td>
                                    <td>
                                        {{ $proposal->name }}
                                    </td>
                                    <td>
                                        {{ $proposal->tanggal }} <br>
                                        {{ $proposal->tanggal_selesai }}
                                    </td>
                                    <td>
                                        @php
                                            $totalSum = 0;
                                            foreach ($proposal->receipt_of_fund as $budget) {
                                                $totalSum += $budget->nominal;
                                            }
                                            $totalDanaNonRutin += $totalSum;
                                        @endphp
                                        Rp. {{ number_format($totalSum, 2) }},-
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total Dana Non Rutin</strong></td>
                                <td><strong>Rp. {{ number_format($totalDanaNonRutin, 2) }},-</strong></td>
                            </tr>
                            <tr>
                                <td colspan="4"><strong>Total Dana Kemahasiswaan</strong></td>
                                <td><strong>Rp. {{ number_format($totalDanaRutin + $totalDanaNonRutin, 2) }},-</strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
