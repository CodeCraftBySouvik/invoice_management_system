@extends('layouts.admin')

@section('customcss')
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
                        <h5 class="mb-2 mb-md-0">Edit {{ ucfirst($page['term']) }}</h5>
                    </div>
                    <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                        <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                        <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Delete</a>
                        <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Print</a>
                        <a href="{{ route('admin.'. $page['term'] .'.view', ['id' => 5]) }}" type="button" class="btn btn-primary-app">Save</a>
                    </div>
                </div>

                <div class="row py-2 py-md-4">
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Quotation Number</label>
						    <input type="text" class="form-control" placeholder="" name="quotation_number" value="#55" disabled>
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Date</label>
						    <input type="text" class="form-control" placeholder="" name="date" value="06/10/2024">
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Valid Till</label>
						    <input type="text" class="form-control" placeholder="" name="valid_till" value="12/10/2024">
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>TRN - VAT Number</label>
						    <input type="text" class="form-control" placeholder="" name="trn_vat_number" value="1234561234561234">
					    </div>
    				</div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Company For</label>
                            <select class="form-select form-control" name="customer" id="customer">
                                <option value="" selected disabled></option>
                                <option value="1" selected>Advanced Network Solutions</option>
                                <option value="2"  >Select 3</option>
                                <option value="3"  >Select 4</option>
                            </select>
                            @include('includes.utils.field-validation', ['field' => 'customer', 'message' => 'Please select a customer'])
                        </div>
                    </div>
                </div>

                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <table id="{{ $page['term'] }}_list" class="table table-v2">
                        <thead>
                            <tr>
                                <th style="width: 50%">Product</th>
                                <th class="text-center" style="width: 10%">Quantity</th>
                                <th class="text-center" style="width: 15%">Rate</th>
                                <th class="text-center" style="width: 10%"></th>
                                <th class="text-center" style="width: 15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <select class="form-select form-control" name="product[]" id="product">
                                            <option value="" selected disabled></option>
                                            <option value="1">Hand Sanitizer</option>
                                            <option value="2"  >Select 3</option>
                                            <option value="3"  >Select 4</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control text-end" placeholder="" name="quantity[]" value="100">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control text-end" placeholder="" name="rate[]" value="110.75">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control amount_value text-center border-0 cursor-default" placeholder="" name="amount[]" value="11075.00" hidden1>
                                        <!-- <p class="amount_value text-center m-0">11075.00</p> -->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary-app btn-add">Add Item</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <div class="col-md-6">
                        <div class="form-group m-0">
    				        <label>Note</label>
						    <textarea class="form-control" placeholder="" name="note" rows="2">{{ old('note') }}</textarea>
					    </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <div class="row py-1 align-items-center border-bottom border-top border-dark-subtle">
                            <div class="col-md-6"><p class="m-0">Subtotal:</p></div>
                            <div class="col-md-6">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control subtotal text-end border-0 cursor-default" placeholder="" name="subtotal[]" value="11075.00">
                                </div>
                            </div>
                        </div>
                        <div class="row py-1 align-items-center">
                            <div class="col-md-6"><p class="m-0">VAT(5%):</p></div>
                            <div class="col-md-6">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control subtotal text-end border-0 cursor-default" placeholder="" name="vat[]" value="553.75">
                                </div>
                            </div>
                        </div>
    				</div>
                </div>

                <div class="row py-2">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <div class="row py-1 align-items-center">
                            <div class="col-md-6"><p class="m-0">Grandtotal:</p></div>
                            <div class="col-md-6">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control subtotal text-end border-0 cursor-default" placeholder="" name="total[]" value="11628.75">
                                </div>
                            </div>
                        </div>
    				</div>
                </div>
            </div>

            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pt-2 pt-md-4 border-top1 border-light-subtle1">
                <div>
                    @include('includes.utils.session-alert')
                </div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Delete</a>
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Print</a>
                    <a href="{{ route('admin.'. $page['term'] .'.view', ['id' => 5]) }}" type="button" class="btn btn-primary-app">Save</a>
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('customjs')
<script src="{{ env('COMMON_HOST') . 'assets/admin/js/dropzone.min.js' }}"></script>

{{-- <script>
    Dropzone.options.adminSessionCoverDropzone = {
        url: "{{ route('admin.session.cover.submit') }}",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        },
        paramName: "sessionCover",
        maxFilesize: 2,
        maxFiles: 1,
        uploadMultiple: false,
        previewsContainer: ".previewsSessionCover",
        disablePreviews : true,

        success: function(file, response){
            var dzFile = this;
            var html = '';
            var feedback = $('#form-feedback-session-cover');
            switch (response) {
                case 'uploaded': html = '<div class="alert alert-success">Session Cover Uploaded successfully</div>'; break;
                case 'not found': html = '<div class="alert alert-danger">no file was uploaded</div>'; break;
                case 'invalid ext': html = '<div class="alert alert-danger">Invalid extension</div>'; break;
            }
            feedback.html(html);
            setTimeout(function(){
                feedback.html('');
            }, 5000);
        },
    };
</script> --}}

<!-- <script type="text/javascript">
    $('#category').change(function(){
        var val = $(this).val();
        console.log(val);
        $('#category_selected').val(val);
    });
</script> -->
@endsection
