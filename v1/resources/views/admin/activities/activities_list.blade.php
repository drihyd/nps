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
                 <form class="table-filter form-inline mb-4" action="{{route('filter.teams')}}" method="post">
@csrf
@include('admin.common_pages.departments',['team'=>$team??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/activities')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/activities')}}">Clear filter</a>
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
                        <th>Activity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($activities_data as $activity)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($activity->activity_name??'')}}</td>
                              
                           
                              
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/activities/edit/'.Crypt::encryptString($activity->id))}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/activities/delete/'.Crypt::encryptString($activity->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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



