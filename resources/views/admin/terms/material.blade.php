@extends('layouts.admin')

@section('customcss')
<link href="{{ env('COMMON_HOST') . 'assets/admin/css/dataTables.bootstrap4.css' }}" rel="stylesheet">
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">{{ ucwords($page['term']) }}</li>
        </ol>
        <form action="{{ route('admin.term.add.submit', ['name' => $page['name']]) }}" name="add_terms" id="add_terms" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="term_type" value="{{$page['name']}}">

            <div class="box_general padding_bottom">
        		<div class="header_box version_2">
    				<h2><i class="fa fa-file"></i>Add {{ ucfirst($page['name']) }}</h2>
    			</div>
    			@include('includes.utils.session-alert')
    			<div class="row">
    				<div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label>Order</label>
                            <input type="text" class="form-control" placeholder="" name="order" value="{{ old('order') }}">
                        </div>
                    </div> -->
                    <!-- <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <div class="styled-select">
                                <select name="status" id="status">
                                    <option value="1">Active</option>
                                    <option value="2">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-md-12">
                        <div class="text-right">
                            <input type="reset" value="Clear" class="btn_1">
                            <input type="submit" value="Submit" class="btn_1">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="card mb-3">
            <div class="card-header"><i class="fa fa-table"></i> List of {{ $page['name'] }}</div>
                <div class="card-body">
                    <!-- @include('includes.utils.session-alert') -->
                    <div class="table-responsive">
                        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="{{ $page['name'] }}_list" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th style="width: 24px">Sl</th>
                                                <th>Name</th>
                                                <th>Status</th>
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
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
    </div>
</div>

@endsection

@section('customjs')
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/jquery.dataTables.js' }}"></script>
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/dataTables.bootstrap4.js' }}"></script>

<script type="text/javascript">
    $(function () {
        var table = $("#{{ $page['name'] }}_list").DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('admin.term.list.ajax', ['name' => $page['name']]) }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name', searchable: true},
                {data: 'status', name: 'status', searchable: false},
                {data: 'action', name: 'action', searchable: false},
            ]
        });
    });
</script>
@endsection
