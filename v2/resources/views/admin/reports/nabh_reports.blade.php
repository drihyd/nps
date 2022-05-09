@extends('admin.template_v1')
@section('title', $PageTitle)
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-header">
<h5 class="card-title">@yield('title')</h5>
</div>
<div class="card-body">

<form class="table-filter mb-4 form-inline" action="{{route('filter.performitor_reports')}}" method="post">
@csrf
@include('admin.common_pages.dates_input')
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<a class="btn btn-warning btn-sm mb-2" href="{{ route('performitor.export') }}">Export Data</a>
&nbsp;
</form>




@include('admin.reports.table_nabh',["responses_data"=>$Restul_Data??''])
</div>
</div>
</div>
</div>
@endsection



