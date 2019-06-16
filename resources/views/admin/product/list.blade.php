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
					Product List
				</div>
				<div class="card-body">
					<table class="table table-sm" id="data-table">
						<thead>
							<tr>								
								<th>Title</th>
								<th>Price</th>
								<!-- <th>Total Sell Amount</th>
								<th>Total Sell Point</th>
								<th>Sell Count</th> -->
								<th>Added By</th>
								<!-- <th>Category</th>
								<th>Is Featured?</th> -->
								<th>Status</th>
								<th>Created At</th>
								<th style="min-width: 280px;">Action</th>
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
        ajax: "{!! route('admin-product-list-data',['user_id'=>$user_id, 'category_id'=>$category_id, 'subcategory_id'=>$subcategory_id, 'status'=>$status]) !!}",
        columns: [
            { data: 'title', name: 'title' },
            { data: 'price', name: 'price' },
            //{ data: 'total_sell_amount', name: 'total_sell_amount', bSearchable:false, bSortable:false},
            //{ data: 'total_sell_point', name: 'total_sell_point', bSearchable:false, bSortable:false},
            //{ data: 'sell_count', name: 'sell_count', bSearchable:false, bSortable:false},
            { data: 'created_by', name: 'created_by', bSearchable:false, bSortable:false},
            //{ data: 'category', name: 'category', bSearchable:false, bSortable:false},
            //{ data: 'is_featured', name: 'is_featured' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop