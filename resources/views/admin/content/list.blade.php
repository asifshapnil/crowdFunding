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
					Content List
					<!-- <a href="{{route('admin-content-add')}}" class="btn btn-success btn-sm pull-right">Add New</a> -->
				</div>
				<div class="card-body">
					<table class="table table-sm" id="data-table">
						<thead>
							<tr>								
								<th>Title</th>
								<th>Added By</th>
								<th>Status</th>
								<th>Created At</th>
								<th style="min-width: 100px;">Action</th>
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
        order: [ [3, 'desc'] ],
        ajax: "{!! route('admin-content-list-data') !!}",
        columns: [
            { data: 'title', name: 'title' },
            { data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop