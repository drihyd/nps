@php

$organization=DB::table('users')->join('organizations', 'users.organization_id', '=', 'organizations.id')
        ->where('users.organization_id',Auth::user()->organization_id)
        ->where('users.role',2)
        ->get(['users.*','organizations.company_name as companyname'])->first();
@endphp

<div class="breadcrumbbar">
<div class="row align-items-center">
<div class="col-md-8 col-lg-8">
<h4 class="page-title">{{Str::Title(auth()->user()->firstname??'')}} {{Str::Title(auth()->user()->lastname??'')}} - Dashboard</h4>
<div class="breadcrumb-list">
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="{{url(Config::get('constants.user').'/dashboard')}}">Home</a></li>
<li class="breadcrumb-item" active aria-current="page"><a href="#">{{$pageTitle??''}}</a></li>
</ol>
</div>
</div>
<div class="col-md-4 col-lg-4">
<!--
<div class="widgetbar">
<a href="{{url(Config::get('constants.user').'/survey')}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Start Survey</a>
</div>-->  

<div class="widgetbar">
<a target="_new" href="{{URL('user/survey/start/'.Crypt::encryptString(1))}}" class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i>Start Survey</a>
</div>                     
</div>
</div>          
</div>