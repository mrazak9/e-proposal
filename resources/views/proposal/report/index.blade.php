@extends('layouts.dashboard')

@section('template_title')
    Report Proposal
@endsection

@section('content')
    <div class="card">
        <div class="card-title">

        </div>
        <script type="text/javascript">
            $(document).ready(function() {

                // Format mata uang.
                $('.uang').mask('000.000.000', {
                    reverse: true
                });

            })
        </script>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12 col-md-6 mb-md-0 mb-4">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="row">
                                <div class="col-lg-6 col-7">
                                    <h3>Proposal disetujui</h3>
                                    <p class="text-sm mb-0">
                                        <i class="fa fa-check text-success" aria-hidden="true"></i>
                                        <span class="font-weight-bold ms-1">{{ $proposals->count() }} selesai</span> tahun
                                        ini
                                    </p>
                                </div>
                            </div>
                            <hr>
                        </div>

                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                #
                                            </th>
                                            <th class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Nama</th>
                                            <th
                                                class="text-uppercase text-secondary text-sm font-weight-bolder opacity-7 ps-2">
                                                Organisasi</th>
                                            <th
                                                class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">
                                                Acara</th>
                                            <th>
                                                Total Anggaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @forelse ($proposals as $proposal)
                                            <tr>
                                                <td class="align-middle">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm">{{ ++$i }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{ $proposal->name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle">
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <div class="d-flex flex-column">
                                                            <h6 class="mb-0 text-sm">{{ $proposal->org_name }}</h6>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="align-middle text-center text-sm">
                                                    <span class="text-xs font-weight-bold"> {{ $proposal->event->name }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @php
                                                        $total = App\Models\BudgetExpenditure::Select('proposal_id', 'total')
                                                            ->where('proposal_id', $proposal->id)
                                                            ->sum('total');
                                                    @endphp

                                                    <strong><span>Rp. </span><span
                                                            class="uang">{{ $total }}</span><span>,-</span></strong>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td>
                                                    <span class="badge bg-danger text-white">Belum ada data proposal</span>
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6" style="padding-top: 1em">
                    <h4 style="text-align: center">{{ $chartProposal->options['chart_title'] }}</h4>
                    {!! $chartProposal->renderHtml() !!}
                </div>
                <br />
                <div class="col-md-6" style="padding-top: 1em">
                    <h4 style="text-align: center">{{ $chartEvent->options['chart_title'] }}</h4>
                    {!! $chartEvent->renderHtml() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    {!! $chartProposal->renderChartJsLibrary() !!}
    {!! $chartProposal->renderJs() !!}
    {!! $chartEvent->renderJs() !!}
@endsection
