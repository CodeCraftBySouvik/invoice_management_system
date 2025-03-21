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
                        <h5 class="mb-2 mb-md-0">{{ ucfirst($page['term']) }}</h5>
                    </div>
                    <!-- <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                        <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                    </div> -->
                </div>

                <div class="row py-2 py-md-4 border-bottom border-light-subtle">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Select category</label>
                            <select class="form-select form-control" name="category" id="category">
                                <option value="" selected disabled></option>
                                <option value="1"  >Sale</option>
                                <option value="2"  >Marketing</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Dates Between</label>
						    <input type="date" class="form-control" placeholder="" name="date" value="{{ old('date') }}">
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label class="d-block">&nbsp;</label>
						    <!-- <input type="date" class="form-control" placeholder="" name="date" value="{{ old('date') }}"> -->
                            <button type="button" class="btn btn-primary-app">Get Report</button>
					    </div>
    				</div>
                </div>
            </div>
        </form>
        
        <div class="box py-2 py-md-4">
            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4">
                <div class="title">
                    <h5 class="mb-2 mb-md-0">Sales {{ ucfirst($page['term']) }}</h5>
                </div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" class="text-decoration-none text-body-emphasis">Download <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/icon-download-pdf.svg' }}" alt="icon" width="28" height="28" loading="lazy" /></a>
                </div>
            </div>
            <!-- <div class="table-wrapper"> -->
                <table id="{{ $page['term'] }}_list" class="table table-bordered1 dt-responsive nowrap1">
                    <thead>
                        <tr>
                            <th>Invoice No</th>
                            <th>Invoice To</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= 10; $i++)
                        <tr>
                            <td class="color-light-app">#001</td>
                            <td>Global Tech Solutions</td>
                            <td class="color-light-app">06/10/24</td>
                            <td>AED 15,000</td>
                            <td class="color-light-app cursor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="d-flex align-items-center status"><i class="bi bi-circle-fill text-success"></i><span>Received</span>
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
