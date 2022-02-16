@extends('admin.template_v1')
@section('title', 'Performitor Reports')
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
<a class="btn btn-warning mb-2" href="{{ route('performitor.export') }}">Export Data</a>
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/performitor_reports')}}" >Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/performitor_reports')}}">Clear filter</a>
@endif
@else
<a href="#">
@endif
</div>
</form>




@include('admin.reports.table_performitors',["responses_data"=>$responses_data])
</div>
</div>
</div>
</div>
@endsection



