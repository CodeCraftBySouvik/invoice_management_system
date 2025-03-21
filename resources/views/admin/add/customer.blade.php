@extends('layouts.admin')

@section('customcss')
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <form action="{{ route('admin.'. $page['term'] .'.add.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
            @csrf
            <input type="hidden" name="user_type" value="customer">
            <input type="hidden" name="user_role" value="3">

            <input type="hidden" name="content_type" value="{{$page['term']}}">

            <div class="box py-2 py-md-4">

                <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4 border-bottom border-light-subtle">
                    <div class="title">
                        <h5 class="mb-2 mb-md-0">Add {{ ucfirst($page['term']) }}</h5>
                    </div>
                    <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-primary-app">
                    </div>
                </div>

                <div class="row py-2 py-md-4">
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Customer ID</label>
						    <input type="text" class="form-control" placeholder="" name="customer_id" value="#85" disabled>
					    </div>
    				</div>
                    <div class="col-md-8">
    				    <div class="form-group">
    				        <label>Company Name</label>
						    <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                            @include('includes.utils.field-validation', ['field' => 'company_name', 'message' => 'Please enter your company name'])
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>TRN - VAT Number</label>
						    <input type="text" class="form-control" placeholder="" name="trn_vat_number" value="{{ old('trn_vat_number') }}">
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Email ID</label>
						    <input type="text" class="form-control" placeholder="" name="email" value="{{ old('email') }}">
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Phone Number</label>
						    <input type="text" class="form-control" placeholder="" name="phone" value="{{ old('phone') }}">
					    </div>
    				</div>
                    {{--<div class="col-md-4">
                        <div class="form-group">
                            <label>Product category</label>
                            <select class="form-select form-control" name="category" id="category">
                                <option value="" selected disabled></option>
                                <option value="1"  >Cosmetic</option>
                                <option value="2"  >Select 3</option>
                                <option value="3"  >Select 4</option>
                            </select>
                        </div>
                    </div>--}}
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Address</label>
						    <input type="text" class="form-control" placeholder="" name="address" value="{{ old('address') }}">
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>City</label>
						    <input type="text" class="form-control" placeholder="" name="city" value="{{ old('city') }}">
					    </div>
    				</div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>State</label>
                            <select class="form-select form-control" name="state" id="state">
                                <option value="" selected disabled></option>
                                <option value="1" >Dubai</option>
                                <option value="2"  >Select 3</option>
                                <option value="3"  >Select 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Country</label>
                            <select class="form-select form-control" name="country" id="country">
                                <option value="" selected disabled></option>
                                <option value="1" >United Arab Emirates (UAE)</option>
                                <option value="2"  >Select 3</option>
                                <option value="3"  >Select 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
    				</div>
                    <div class="col-md-8">
    				    <div class="form-group">
    				        <label>Comment</label>
						    <textarea class="form-control" placeholder="" name="comment" rows="5">{{ old('comment') }}</textarea>
					    </div>
    				</div>
                </div>
            </div>
            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pt-2 pt-md-4 border-top border-light-subtle">
                <div>
                    @include('includes.utils.session-alert')
                </div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                    <a href="{{ route('admin.'. $page['term'] .'.list') }}" type="button" class="btn btn-primary-app">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-primary-app">
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
