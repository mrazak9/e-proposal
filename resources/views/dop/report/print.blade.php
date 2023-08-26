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
    <title>Report Dana Rutin</title>
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
                <h2>LAPORAN PENGELUARAN DANA RUTIN</h2>
                <br>
                <h3>Periode {{ request('startdate') }} s/d {{ request('enddate') }}</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Organisasi</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Tanggal Pencairan</th>
                                <th style="text-align: right">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $organizations = [];
                                $totalAllExpenses = 0;
                            @endphp
                            @foreach ($dops as $receiptFundsDop)
                                @php
                                    $organizationName = $receiptFundsDop->dop->organization->singkatan;
                                    $totalAllExpenses += $receiptFundsDop->nominal;
                                    if (!isset($organizations[$organizationName])) {
                                        $organizations[$organizationName] = [
                                            'total' => 0,
                                            'rows' => [],
                                        ];
                                    }
                                    $organizations[$organizationName]['total'] += $receiptFundsDop->nominal;
                                    $organizations[$organizationName]['rows'][] = $receiptFundsDop;
                                @endphp
                            @endforeach
                            @foreach ($organizations as $organizationName => $data)
                                @foreach ($data['rows'] as $receiptFundsDop)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $organizationName }}
                                        </td>
                                        <td>
                                            {{ $receiptFundsDop->dop->created_at }}
                                        </td>
                                        <td>
                                            {{ $receiptFundsDop->tanggal }}
                                        </td>
                                        <td align="right">
                                            Rp. {{ number_format($receiptFundsDop->nominal) }},-
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="4" align="right"><strong>Sub Total {{ $organizationName }}</strong>
                                    </td>
                                    <td align="right"><strong>Rp. {{ number_format($data['total']) }},-</strong></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" align="left"><strong>Total Pengeluaran Dana Rutin</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($totalAllExpenses) }},-</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
