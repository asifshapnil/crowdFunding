@extends('user.layouts.main')

@section('custom_css')
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@stop

@section('ecommerce')
	
@stop

@section('content')
@include('user.layouts.tab')

<div class="container" id="new-project">


<div class="mt20">
	<div class="row">
		<div class="col-md-3">
			@include('user.layouts.profile')
		</div>
		<div class="col-md-9">


			<div class="card padding">
			
			@include('layouts.message')
			
			<div class="card-header">
					前回購入したクレジットカード情報です
					<!-- <a href="{{route('user-cards-add')}}" class="btn btn-success btn-sm pull-right">Add New Card</a> -->
				</div>
				<div class="card-block">
					<div>
						クレジットカート情報はここでは入力できません。支援をしていただく際に入力することができます。
					</div>
					<div class="table-responsive">
					<table class="table table-sm mt20" id="data-table">
						<thead>
							<tr>								
								<th>Name</th>
								<th>Card Number</th>
								<!-- <th>CVV</th> -->
								<th>Expire Month</th>
								<th>Expire Year</th>
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
        order: [ [5, 'asc'] ],
        ajax: "{!! route('user-cards-list-data') !!}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'number', name: 'number'},
            // { data: 'cvv', name: 'cvv'},
            { data: 'exp_month', name: 'exp_month'},
            { data: 'exp_year', name: 'exp_year'},
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
	

@stop