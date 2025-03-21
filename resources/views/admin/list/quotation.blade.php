@extends('layouts.admin')

@section('customcss')
<link href="{{ env('COMMON_HOST') . 'assets/admin/css/dataTables.bootstrap4.css' }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="box py-2 py-md-4">
            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4">
                <div class="title">
                    <h5 class="mb-2 mb-md-0">All {{ ucfirst($page['term']) }}</h5>
                </div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <a href="{{ route('admin.'. $page['term'] .'.add') }}" type="button" class="btn btn-primary-app">Add {{ ucfirst($page['term']) }}</a>
                </div>
            </div>

            <!-- <div class="table-wrapper"> -->
                <table id="{{ $page['term'] }}_list" class="table table-bordered1 dt-responsive nowrap1">
                    <thead>
                        <tr>
                            <th>Quotation ID</th>
                            <th>Quotation To</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 100; $i++)
                        <tr>
                            <td class="color-light-app">#001</td>
                            <td>Global Tech Solutions</td>
                            <td class="color-light-app">06/10/24</td>
                            <td>AED 15,000</td>
                            <td>
                                <div class="d-flex align-items-center actions">
                                    <a href="{{ route('admin.'. $page['term'] .'.print', ['id'=> 5]) }}" class=""><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-print.svg' }}" alt="Icon" width="20" height="20" loading="lazy" /></a>
                                    <a href="{{ route('admin.'. $page['term'] .'.edit', ['id'=> 5]) }}" class=""><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-edit.svg' }}" alt="Icon" width="20" height="20" loading="lazy" /></a>
                                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" class=""><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-delete.svg' }}" alt="Icon" width="20" height="20" loading="lazy" /></a>
                                </div>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            <!-- </div> -->
        </div>
    </div>
</div>

@endsection

@section('customjs')
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/jquery.dataTables.js' }}"></script>
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/dataTables.bootstrap4.js' }}"></script>

<script type="text/javascript">
    $("#{{ $page['term'] }}_list").DataTable({
        searching: false,
        lengthChange: false,
        language: {
            info: "_START_ - _END_ of _TOTAL_",
            paginate: {
                previous: "<i class='bi bi-chevron-double-left'></i>  Prev",
                next: "Next  <i class='bi bi-chevron-double-right'></i>"
            }
        }
    });

    // $(function () {
    //     var table = $("#{{ $page['term'] }}_list").DataTable({
    //         processing: true,
    //         serverSide: true,
    //         ajax: "{{ route('admin.'. $page['term'] .'.list.ajax') }}",
    //         columns: [
    //             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
    //             {data: 'name', name: 'name', searchable: true},
    //             // {data: 'price', name: 'price', searchable: false},
    //             // {data: 'category', name: 'category', searchable: false},
    //             {data: 'status', name: 'status', searchable: false},
    //             {data: 'action', name: 'action', searchable: false},
    //         ]
    //     });
    // });
</script>
@endsection
