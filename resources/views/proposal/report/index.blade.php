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
        <h2 style="text-align: center">{{ $chartProposal->options['chart_title'] }}</h2>
                    {!! $chartProposal->renderHtml() !!}
      </div>
      <div class="col-md-6">
        <h2 style="text-align: center">{{ $chartEvent->options['chart_title'] }}</h2>
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