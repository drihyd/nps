<?php
use App\Models\User;
?>
@extends('admin.template_v1')
@section('title', 'Users')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">List of all users</h5>
            </div>
            <div class="card-body">
                <form class="form-inline mb-4" action="{{route('filter.roles')}}" method="post">
@csrf
@include('admin.common_pages.roles',['role'=>$role??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/users')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/users')}}">Clear filter</a>
@endif
@else
<a href="#">
@endif

</div>




</form>

			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>User Details</th>
                        <!-- <th>Email/Username</th> -->
                        <!-- <th>Decrypt Password</th> -->
                        <!-- <th>Phone</th> -->
                        <th>Designation</th>
                        <th>Reporting To</th>
                      
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($users_data as $user)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td><b>{{Str::title($user->firstname??'')}} {{Str::title($user->lastname??'')}}</b><br>{{$user->email??''}}<br>{{$user->phone??''}}</td>
                              <!-- <td></td> -->
                              <!--<td>{{$user->decrypt_password??''}}</td> -->
                              <!-- <td></td> -->
                              <td>{{$user->ut_name??''}}</td>
                              @php
                              $Report_person=User::select('departments.department_name as dname','users.id as uid','users.email as uemail','users.firstname as uname')
                                ->leftJoin('departments','departments.id', '=', 'users.department')
                                ->where("users.organization_id",Auth::user()->organization_id)
                                ->where("users.id",$user->reportingto)
                                ->get()->first();

                              @endphp
                              <td>{{ucwords($Report_person->uname??'')}}-{{ucwords($Report_person->uemail??'')}}-{{ucwords($Report_person->dname??'')}}</td>
                              
                           
                              
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/user/edit/'.Crypt::encryptString($user->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/user/delete/'.Crypt::encryptString($user->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
			
			</div>
        </div>
      </div>
</div>
</div>
        @endsection



