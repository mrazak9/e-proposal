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
                                $groupedDops = $dops->groupBy('organization_id');
                                $grandTotal = 0; // Initialize grand total
                            @endphp

                            @foreach ($groupedDops as $organizationId => $groupedDop)
                                @php
                                    $organization = \App\Models\Organization::find($organizationId);
                                    $totalAmount = 0; // Initialize total amount for this organization
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td colspan="4">
                                        <strong>{{ $organization->singkatan }}</strong>
                                    </td>
                                </tr>
                                @foreach ($groupedDop as $dop)
                                    @php
                                        $dop_id = $dop->id;
                                        $receiveBy = \App\Models\ReceiptOfFundsDop::select('user_id')
                                            ->where('dop_id', $dop_id)
                                            ->first();
                                        $totalDopAmount = \App\Models\DopTransaction::select('amount')
                                            ->where('dop_id', $dop_id)
                                            ->sum('amount');
                                        $totalAmount += $totalDopAmount; // Add to the organization's total
                                    @endphp
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>{{ date('l, F jS', strtotime($dop->created_at)) }}</td>
                                        <td>
                                            {{-- @forelse ($dop->receiptfundsdop->tanggal as $dr)
                                                {{ $dr->tanggal }}
                                            @empty
                                                Belum pencairan
                                            @endforelse --}}
                                        </td>
                                        <td align="right">
                                            @foreach ($dop->dop_transaction as $dt)
                                                Rp. {{ number_format($dt->amount) }} <br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3"></td>
                                    <td><strong>Sub Total:</strong></td>
                                    <td align="right"><strong>Rp. {{ number_format($totalAmount) }}</strong></td>
                                </tr>
                                @php
                                    $grandTotal += $totalAmount; // Add organization's total to the grand total
                                @endphp
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total Pengeluaran Dana Rutin:</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($grandTotal) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
