@extends('layouts.admin')

@section('customcss')
<link href="{{ env('COMMON_HOST') . 'assets/admin/css/dataTables.bootstrap4.css' }}" rel="stylesheet">
@endsection

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <form action="{{ route('admin.'. $page['term'] .'.add.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
            @csrf
            <input type="hidden" name="content_type" value="{{$page['term']}}">

            <div class="box py-2 py-md-4">

                <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4 border-bottom border-light-subtle">
                    <div class="title">
                        <h5 class="mb-2 mb-md-0">{{ strtoupper($page['term']) }} Declaration</h5>
                    </div>
                    <!-- <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                        <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                    </div> -->
                </div>

                <div class="row py-2 py-md-4 border-bottom border-light-subtle">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select Term</label>
                            <select class="form-select form-control" name="category" id="category">
                                <option value="" selected disabled></option>
                                <option value="1"  >Nov 2024 - Jan 2025</option>
                                <option value="2"  >Nov 2023 - Jan 2024</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label class="d-block">&nbsp;</label>
						    <!-- <input type="date" class="form-control" placeholder="" name="date" value="{{ old('date') }}"> -->
                            <button type="button" class="btn btn-primary-app">Get VAT Report</button>
					    </div>
    				</div>
                </div>
            </div>
        </form>
        
        <div class="box py-2 py-md-4">
            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4">
                <div class="title">
                    <h5 class="mb-2 mb-md-0">{{ strtoupper($page['term']) }} Report</h5>
                </div>
            </div>
            <!-- <div class="table-wrapper"> -->
                <table id="{{ $page['term'] }}_list" class="table table-bordered1 dt-responsive nowrap1">
                    <thead>
                        <tr>
                            <th>Report Name</th>
                            <th class="text-center">Report Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nov 2024 -  Jan 2025</td>
                            <td class="color-light-app text-center">05/02/25</td>
                            <td class="color-light-app text-center">
                                <div class="d-flex flex-wrap align-items-center justify-content-center">
                                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" class="text-decoration-none text-body-emphasis"><img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-download.svg' }}" alt="icon" width="28" height="28" loading="lazy" /> Download</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            <!-- </div> -->

            <div class="alert alert-success mt-4" role="alert">
                <p class="alert-heading">VAT Report Upload Guide</p>
                <p class="mb-0">To upload a VAT report in the UAE Tax Portal, log in to the Federal Tax Authority (FTA) website, navigate to the VAT section, select 'Submit VAT Return,' fill in the required details, and upload the VAT report in the prescribed format before submitting.</p>
            </div>
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
        paging: false,
        ordering: false,
        info: false,
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
