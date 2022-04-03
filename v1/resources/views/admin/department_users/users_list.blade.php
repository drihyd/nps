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
                    <form class="table-filter mb-4 form-inline" action="{{route('filter.roles')}}" method="post">
                        @csrf
                        @include('admin.common_pages.roles',['role'=>$role??''])
                        &nbsp;
                        @include('admin.common_pages.action_button')
                        
                    </form>

			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display nowrap table Config::get('constants.tablestriped')" style="width:100%">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>
                        <th>User Details</th>
                        <!-- <th>Email/Username</th> -->
                        <!--<th>Decrypt Password</th>-->
                        <!-- <th>Phone</th> -->
                        <th>Designation</th>
                        <th>Team</th>
                        <th>Reporting To</th>
                        <!--<th>Is Active</th>-->
                      
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>			
		
                  
                      @foreach ($users_data as $user)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td><b>{{Str::title($user->firstname??'')}} {{Str::title($user->lastname??'')}}</b><br>{{$user->email??''}}<br>{{$user->phone??''}}</td>
                              <!-- <td></td> -->
                              <!--<td>{{$user->decrypt_password??''}}</td>-->
                              <!-- <td></td> -->
                              <td>{{$user->ut_name??''}}</td>
                              <td>{{$user->dname??''}}</td>
                              @php
                              $Report_person=User::select('departments.department_name as dname','users.id as uid','users.email as uemail','users.firstname as uname')
                                ->leftJoin('departments','departments.id', '=', 'users.department')
                                ->where("users.organization_id",Auth::user()->organization_id)
                                ->where("users.id",$user->reportingto)
                                ->get()->first();

                              @endphp

                              <td>{{ucwords($Report_person->uname??'')}}</td>
                             
<!--
							 @if($user->is_active_status??'' == 1)
                           <td>Yes</td>
                           @else
                            <td>No</td>
                           @endif
						   -->
                              
                              <td>

							  
							  <a href="{{url(Config::get('constants.admin').'/user/edit/'.Crypt::encryptString($user->id))}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/user/delete/'.Crypt::encryptString($user->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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



