@extends('admin.template_v1')
@section('title', 'Notifications')
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
                        <th>Gateway</th>
                        <th>Is Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($notifications_data as $notification)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::upper($notification->gateway_type??'')}}</td>
                              <td>{{Str::title($notification->is_active??'')}}</td>
                              
                           
                              
                              <td>
							  
							  <a href="{{url(Config::get('constants.admin').'/notifications/edit/'.Crypt::encryptString($notification->id))}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/notifications/delete/'.Crypt::encryptString($notification->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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



