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
					Project List
				</div>
				<div class="card-body">
					<table class="table table-sm" id="data-table">
						<thead>
							<tr>								
								<th>Title</th>
								<th>Budget</th>
								<!-- <th>Total Invested</th>
								<th>Total Invested Amount</th>
								<th>Total Point</th> -->
								<th>Added By</th>
								<!-- <th>Category</th>
								<th>End Date</th> -->
								<th>Status</th>
								<th>Created At</th>
								<th style="min-width: 160px;">Action</th>
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
        order: [ [4, 'desc'] ],
        ajax: "{!! route('admin-project-list-data',['user_id'=>$user_id, 'category_id'=>$category_id, 'status'=>$status]) !!}",
        columns: [
            { data: 'title', name: 'title' },
            //{ data: 'purpose', name: 'purpose' },
            { data: 'budget', name: 'budget' },
            //{ data: 'total_invested', name: 'total_invested', bSearchable:false, bSortable:false},
            //{ data: 'total_invested_amount', name: 'total_invested_amount', bSearchable:false, bSortable:false},
            //{ data: 'total_point', name: 'total_point', bSearchable:false, bSortable:false},
            { data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
            //{ data: 'category', name: 'category', bSearchable:false, bSortable:false},
            //{ data: 'end', name: 'end' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop