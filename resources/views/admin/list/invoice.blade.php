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
                            <th>Invoice No</th>
                            <th>Invoice To</th>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Payment Status</th>
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
                            <td class="color-light-app cursor" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="d-flex align-items-center status"><i class="bi bi-circle-fill text-success"></i><span>Received</span>
                            </td>
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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div> -->
      <div class="modal-body">
        <div class="form-group">
            <label>Payment Status</label>
            <select class="form-select form-control" name="payment_status" id="payment_status">
                <option value="" selected disabled></option>
                <option value="1"  >Received</option>
                <option value="2"  >Select 3</option>
                <option value="3"  >Select 4</option>
            </select>
        </div>

        <div class="buttons d-flex align-items-center justify-content-center mt-4">
            <button type="button" class="btn btn-primary-app" data-bs-dismiss="modal">Cancel</a>
            <button type="button" class="btn btn-primary-app" data-bs-dismiss="modal">Save</a>
        </div>

      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
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
