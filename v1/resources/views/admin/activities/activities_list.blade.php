@extends('admin.template_v1')
@section('title', 'Activities')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
			
          <div class="table-responsive">
        
          <table id="default-datatable" class="display table Config::get('constants.tablestriped')">
                <thead class="thead-dark">
                    <tr>
                        <th>S.No</th>

                        <th>Name</th>
                        <th>Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($activities_data as $activity)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($activity->activity_name??'')}}</td>
                              <td>{{$activity->department_name??''}}</td>
                              
                           
                              
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/activities/edit/'.Crypt::encryptString($activity->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/activities/delete/'.Crypt::encryptString($activity->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
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



