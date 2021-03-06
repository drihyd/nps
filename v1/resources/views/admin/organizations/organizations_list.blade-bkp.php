@extends('admin.template_v1')
@section('title', 'Dashboard')
@section('content')
<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h5 class="card-title">List of all the organizations</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table  class="table table-bordered  data-table">
                        <thead class="bg-dark text-white">
                            <tr>
                                <th>Company Name</th>
                                <th>Entity Type</th>
								<th>City</th>                            
                                <th>Activation Date</th>
                                <!-- <th>License Expiry Date</th> -->
								<th>Status</th>
								<th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
@endsection
@push('scripts')
<script type="text/javascript">
  $(function () {
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('organizations_lists.index') }}",
        columns: [
            {data: 'short_name', name: 'short_name'},
            {data: 'entity_group', name: 'entity_group'},
            {data: 'city', name: 'city'},          
            {data: 'license_startdate', name: 'license_startdate'},
            // {data: 'license_startdate', name: 'license_startdate'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    $(document).on("click",".nddelete",function(e){
    var id = $(this).attr('data-id');
        if (confirm("Are you Sure want to Delete?") == true) {
          var id = id;
          // ajax
          $.ajax({
            type:"POST",
            url: "{{ route('organizations.delete') }}",
            data: {_token: "{{ csrf_token() }}", id: id },
            dataType: 'json',
            success: function(res){
              var oTable = $('.data-table').dataTable();
              oTable.fnDraw(false);
            }
          });
        }
    });
    
  });
</script>
@endpush