@extends('admin.template_v1')
@section('content')
<div class="paddingleftright pt-2 pb-5" >
      <div class="row p-0 m-0">
            
            
          <div class="table-responsive">
        
          <table width="100%" class="table customdatatable" id="orders-table">
                <thead class="thead-dark">
                    <tr>
                        <th><b>S.No</b></th>
                        <th ><b>Name</b></th>
                        <th ><b>Email</b></th>
                        <th ><b>Phone</b></th>
                        <th ><b>Role</b></th>
                        <th><b>Status</b></th>
                        <th ><b>Actions</b></th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($users_data as $user)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{ucwords($user->firstname??'')}} {{ucwords($user->lastname??'')}}</td>
                              <td>{{$user->email??''}}</td>
                              <td>{{$user->phone??''}}</td>
                              <td>{{$user->ut_name??''}}</td>
                              
                              @if($user->is_active_status == 1)

                              <td><span class="badge badge-pill badge-success">Active</span></td>
                              @else
                              <td><span class="badge badge-pill badge-danger">Inactive</span></td>
                              @endif
                              
                              <td><a href="{{url('user/edit/'.Crypt::encryptString($user->id))}}" class="edit mr-2" title="Edit" ><i class="fas fa-pen"></i></a>
                                <a href="{{url('user/delete/'.Crypt::encryptString($user->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fas fa-trash-alt"></i></a>
                              </td>
                          </tr>
                          @endforeach
                      </tbody>
                      
            </table>
        </div>
      </div>
</div>
        @endsection



