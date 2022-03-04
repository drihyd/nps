@extends('admin.template_v1')
@section('title', 'Responses')
@section('content')
<div class="row">
<div class="col-lg-12">
<div class="card m-b-30">
<div class="card-body">
@include('admin.responses.responses_list_common')
</div>
</div>
</div>
</div>
@endsection



