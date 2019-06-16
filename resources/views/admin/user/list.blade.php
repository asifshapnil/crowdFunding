@extends('admin.layouts.main')

@section('custom_css')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@stop

@section('content')
	<div class="row">
		

		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					User List
				</div>
				<div class="card-body">
					@include('admin.layouts.message')
					
					<table class="table table-sm" id="data-table">
						<thead>
							<tr>								
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<!-- <th>Email Verified?</th> -->
								<th>Total Project</th>
								<th>Total Product</th>
								<th>point</th>
								<!-- <th>Last Login</th> -->
								<th>Status</th>
								<th>Created At</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
@stop

@section('custom_js')


<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
$(function() {
    var dataTable = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        //bSort: false,
        order: [ [7, 'desc'] ],
        ajax: "{!! route('admin-user-list-data') !!}",
        columns: [
            { data: 'first_name', name: 'first_name' },
            { data: 'last_name', name: 'last_name' },
            { data: 'email', name: 'email' },
            // { data: 'is_email_verified', name: 'is_email_verified' },
            { data: 'total_projects', name: 'total_projects', bSearchable:false, bSortable:false  },
            { data: 'total_products', name: 'total_products', bSearchable:false, bSortable:false  },
            { data: 'point', name: 'point' },
            // { data: 'last_login_date', name: 'last_login_date' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop