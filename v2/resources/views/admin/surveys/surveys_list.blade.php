@extends('admin.template_v1')
@section('title', 'Questionnaire')
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
                        <th>Title</th>
                        <th>Description</th>
                        <th>Is Active?</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                  
                      @foreach ($surveys_data as $survey)  
                          <tr>
                              
                              <td>{{$loop->iteration}}</td>
                              <td>{{Str::title($survey->title??'')}}</td>
                              <td width="50%">{{$survey->description??''}}</td>
                              <td><input data-id="{{$survey->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $survey->isopen =='yes'?'checked' : '' }}></td>
                              <td>
							  <a href="{{url(Config::get('constants.admin').'/questionnaire/edit/'.Crypt::encryptString($survey->id))}}" class="edit mr-2" title="Edit" ><i class="feather icon-edit-2"></i></a>
                                <a href="{{url(Config::get('constants.admin').'/questionnaire/delete/'.Crypt::encryptString($survey->id))}}" class="delete text-danger" title="Delete" onclick="return confirm('Are you sure to delete this?')" ><i class="feather icon-trash"></i></a>
								
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

            


