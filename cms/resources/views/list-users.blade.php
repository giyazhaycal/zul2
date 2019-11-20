@extends('layouts.app')
@section('head_meta')
<!-- Page JS Plugins CSS -->
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.css') }}">
<style>
    .js-dataTable-mineral td:last-child{
        text-align: center;
    }
</style>
@endsection

@section('content')

<div class="content">
    <!-- Dynamic Table Full Pagination -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">List of Users</small></h3>
        </div>
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full-pagination class, functionality initialized in js/pages/base_tables_datatables.js -->
            <table class="table table-bordered table-striped js-dataTable-mineral">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Kota</th>
                     	<th>Province</th>
                        {{-- <th class="text-center" style="width: 15%;">Status</th>
                        <th class="text-center" style="width: 20%;">Updated At</th> --}}
                        <th class="hidden-xs">Created At</th>
                        <th class="text-center" style="width: 10%;">Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- END Dynamic Table Full Pagination -->
</div>
<!-- END Page Content -->
@endsection

@section('footer_scripts')
<!-- Page JS Plugins -->
<script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>

<script type="text/javascript">
    //Mineral - Set Datatable Configuration
    var dt_conf =  {
        'ajax' : '{{ url("list-users/datatable") }}',
        'columns' : [
       		{ data: 'user_cid', name: 'user_cid' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'mobile', name: 'mobile' },
            { data: 'address', name: 'address' },
            { data: 'city', name: 'city' },
            { data: 'provice', name: 'province' },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        'order': [[ 2, 'desc' ]],
        'columnDefs' : [ { orderable: false, targets: [ 3 ] } ],
        'pageLength' : 10,
        'lengthMenu' : [[5, 10, 15, 20], [5, 10, 15, 20]]
    };
</script>
<script src="{{ asset('assets/js/pages/base_tables_datatables.js') }}"></script>
@endsection