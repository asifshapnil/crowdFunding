@extends('admin.layouts.main')

@section('custom_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
@stop

@section('content')

    <div class="row">
        

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Admin Users List
                    <a href="{{route('admin-admin-user-add')}}" class="btn btn-success btn-sm pull-right">Add New</a>
                </div>
                <div class="card-body">
                    <table class="table table-sm" id="data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Type</th>
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
        order: [ [3, 'asc'] ],
        ajax: "{!! route('admin-admin-user-list-data') !!}",
        columns: [
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'type', name: 'type' },
            { data: 'status', name: 'status' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', bSearchable:false, bSortable:false }
        ]
    });
});
</script>
@stop