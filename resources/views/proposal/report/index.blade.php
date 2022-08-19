@extends('layouts.dashboard')

@section('template_title')
    Report Proposal
@endsection

@section('content')
<div class="card">
  <div class="card-title">

  </div>
  <div class="card-body">
    <div class="row">
      <div class="col-md-6">
        <h1 style="text-align: center">{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
      </div>
      <div class="col-md-6">
        <h1>Test</h1>
      </div>
    </div>
  </div>
</div>
@endsection
@section('javascript')
{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}
@endsection