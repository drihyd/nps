@extends('admin.template_v1')
@section('title', 'Customer Fields Configurables')
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
                        <th>Label</th>
                        <th>Input Type</th>
                        <th>Input Name</th>
                        <th>Is Display</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($customer_fields_configurables_data as $customer_fields_configurables)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($customer_fields_configurables->label??'')}}</td>
                              <td >{{$customer_fields_configurables->input_type??''}}</td>
                              <td >{{$customer_fields_configurables->input_name??''}}</td>
                              <td >{{Str::title($customer_fields_configurables->is_display??'')}}</td>
                              
                              <td>
							  <a href="{{url(Config::get('constants.admin').'/customer_fields_configurables/edit/'.Crypt::encryptString($customer_fields_configurables->id))}}" class="edit mr-2" title="Edit" ><i class="fa fa-edit"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/customer_fields_configurables/delete/'.Crypt::encryptString($customer_fields_configurables->id))}}" class="delete" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="fa fa-trash"></i></a>
								
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

@push('scripts')
        <script>
  $(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.toggle-class').change(function() {
        // alert('hi');
         toastr.options = {
          "closeButton": true,
          "newestOnTop": true,
          "positionClass": "toast-top-right"
        };
        var status = $(this).prop('checked') == true ? 'yes' : 'no'; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "post",
            dataType: "json",
            url: "{{ url(Config::get('constants.admin').'/changeStatus') }}",
            data: {'isopen': status, 'id': id},
            success: function(data){

          
              if(data.statusCode==200)
                {            
                    toastr.success(data.success);
                }
                else{
                    toastr.error(data.error);
                }
            }
        });
    })
  })
</script>
@endpush

            


