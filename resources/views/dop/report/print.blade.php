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
    <title>Report Dana Rutin | {{ request('startdate') }} - {{ request('enddate') }}</title>
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
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/jquery.mask.js') }}"></script>
    <div class="container-fluid" style="padding: 3em">
        {{-- COVER PAGE --}}
        <div class="row pagebreak">
            <div class="col-md-12">
                <h1>Institut Digital Ekonomi</h1>
                <h1>LPKIA</h1>
                <br>
                <h3>Laporan Dana Rutin</h3>
                <h3>{{ request('startdate') }} - {{ request('enddate') }}</h3>
            </div>
            <div class="col-md-12">
                <p style="text-align:center; filter: grayscale(100%); margin-top: 25%"><img
                        src="{{ asset('images/CAP LPKIA.png') }}" alt="LPKIA logo" height="100px"></p>

            </div>
            <div class="col-md-12" style="margin-top: 38%">
                <h5>Jalan Soekarno Hatta No. 456</h5>
                <h5>Bandung 40266, Jawa Barat</h5>
                <h5><i class="fas fa-phone"></i> 022-7564283 / 7564284</h5>
            </div>
        </div>
        {{-- END OF COVER PAGE --}}
    </div>
    {{-- SUSUNAN KEPANITIAAN --}}
    <div class="container-fluid" style="padding: 1em">
        <div class="row pagebreak">
            <div class="col-md-12">
                <h2>Rincian Pengajuan Dana Rutin</h2>
                <br>
                <h3>Periode {{ request('startdate') }} - {{ request('enddate') }}</h3>
                <div class="table-responsive">

                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Organisasi</th>
                                <th>Nominal</th>
                                <th>Tanggal Pengajuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dops as $dop)
                                @php
                                    $dop_id = $dop->id;
                                    $receiveBy = \App\Models\ReceiptOfFundsDop::select('user_id')
                                        ->where('dop_id', $dop_id)
                                        ->first();
                                    $totalAmount = \App\Models\DopTransaction::select('amount')
                                        ->where('dop_id', $dop_id)
                                        ->sum('amount');
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $dop->organization->name }}</td>
                                    <td>
                                        @foreach ($dop->dop_transaction as $dt)
                                            <ul>Rp. {{ number_format($dt->amount) }}</ul>
                                        @endforeach
                                        <ul>
                                            <strong>
                                                Total Rp. {{ number_format($totalAmount) }}
                                            </strong>
                                        </ul>
                                    </td>
                                    <td>{{ date('l, F jS', strtotime($dop->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
