@extends('admin.template_v1')
@section('title', 'Sub Levels')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            
             <div class="card-header">
                <h5 class="card-title">@yield('title')</h5>
            </div>
            <div class="card-body">
			<form class="table-filter form-inline mb-4" action="{{route('filter.levels')}}" method="post">
@csrf
@include('admin.common_pages.levels',['level'=>$level??''])
&nbsp;
@include('admin.common_pages.action_button')
&nbsp;
<div class="form-group mb-2">
@if(auth()->user())
@if(auth()->user()->role==2)
<a href="{{url(Config::get('constants.admin').'/designation_levels')}}">Clear filter</a>
@else
<a href="{{url(Config::get('constants.user').'/designation_levels')}}">Clear filter</a>
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
                        <th>Sub Level</th>
                        <!-- <th>Level code</th> -->
                        <!-- <th>Level name</th> -->
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($group_level_data as $group_level)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::upper($group_level->role_level??'')}}</td>
                              <!-- <td>{{Str::title($group_level->alias??'')}}</td> -->
                              <!-- <td>{{Str::title($group_level->group_level_name??'')}}</td> -->
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/designation_levels/edit/'.Crypt::encryptString($group_level->id))}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/designation_levels/delete/'.Crypt::encryptString($group_level->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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



