@extends('layouts.admin')

@section('customcss')
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <form action="{{ route('admin.'. $page['term']) }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
            @csrf
            <input type="hidden" name="content_type" value="{{$page['term']}}">

            <div class="box py-2 py-md-4">
                <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4 border-bottom border-light-subtle">
                    <div class="title">
                        <h5 class="mb-2 mb-md-0">{{ ucfirst($page['term']) }}</h5>
                    </div>
                </div>

                <div class="tabs py-2 border-bottom border-light-subtle">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <button class="nav-link active" aria-current="page" id="company-tab" data-bs-toggle="tab" data-bs-target="#company">Company</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product">Products</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="customer-tab" data-bs-toggle="tab" data-bs-target="#customer">Customers</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="quotation-tab" data-bs-toggle="tab" data-bs-target="#quotation">Quotation</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="invoice-tab" data-bs-toggle="tab" data-bs-target="#invoice">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="report-tab" data-bs-toggle="tab" data-bs-target="#report">Report</a>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" id="vat-tab" data-bs-toggle="tab" data-bs-target="#vat">VAT Settings</a>
                        </li>
                    </ul>
                </div>

                 <!-- Tab Content -->
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="company" role="tabpanel" aria-labelledby="home-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Company Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Update all your company information here</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Company Name</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Address</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>City</label>
                                        <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
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
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Phone Number</label>
                                        <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Company Logo</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-control-file d-flex align-items-center justify-content-center w-100">
                                            <span>Upload here</span>
                                            <input type="file" class="form-control font-size-sm" id="company_logo" name="company_logo" placeholder="" required="">
                                            <img class="file-preview" src='' alt='preview' loading='lazy' style='display:none;'>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid company logo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>VAT Registered (TRN) Number</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="" name="company_name" value="{{ old('company_name') }}" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Company Stamp & Signature</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-file d-flex align-items-center justify-content-center w-100">
                                            <span>Upload company Stamp image</span>
                                            <input type="file" class="form-control font-size-sm" id="company_logo" name="company_logo" placeholder="" required="">
                                            <img class="file-preview" src='' alt='preview' loading='lazy' style='display:none;'>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid company logo.
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-control-file d-flex align-items-center justify-content-center w-100">
                                            <span>Upload Authority Signature image</span>
                                            <input type="file" class="form-control font-size-sm" id="company_logo" name="company_logo" placeholder="" required="">
                                            <img class="file-preview" src='' alt='preview' loading='lazy' style='display:none;'>
                                        </div>
                                        <div class="invalid-feedback">
                                            Please enter a valid company logo.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Product Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Add or remove form fields and table coulmns</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>All Available Fields Name</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product Name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Buying Price
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Sales Price
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Quantity in Stock
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Comment
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Table Column Names</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product Name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Product Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Price
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Stock
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Customers Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Add or remove form fields and table coulmns</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>All Available Fields Name</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Customer ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Company Name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                TRN - VAT Number
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Email ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Phone Number
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Address
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Comment
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Customer Table Column Names</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Customer ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Company Name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Phone Number
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Address
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Email ID
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="quotation" role="tabpanel" aria-labelledby="quotation-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Quotation Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Edit your quotation by selecting options</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Quotation Template</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-quotation.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault2" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Current use
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-quotation.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Activate Now
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-quotation.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault2">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Activate Now
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product/Service name</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Dropdown selection
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault1">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Type product /service name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="invoice" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Invoice Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Edit your invoice by selecting options</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Invoice Template</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-invoice.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault3" checked>
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Current use
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-invoice.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Activate Now
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check text-center">
                                            <img class="icon" src="{{ env('COMMON_HOST') . 'assets/admin/img/dummy-invoice.svg' }}" alt="icon" width="180" height="240" loading="lazy" />
                                            <div>
                                                <input class="form-check-input float-none m-0" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault3">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    Activate Now
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product/Service name</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault4">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Dropdown selection
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="" id="flexCheckDefault" name="flexCheckDefault4">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Type product /service name
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="report" role="tabpanel" aria-labelledby="report-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">Report Page Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Add or remove form fields and table coulmns</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Generate Fields Name</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Select Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Select Sub Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Date Between
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Table Column Names</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Invoice Number
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Invoice To
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Date
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Amount
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Payment Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Download Options</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                PDF
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                CSV/Excel
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Pie Chart
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="vat" role="tabpanel" aria-labelledby="vat-tab">
                        <div class="py-3 border-bottom border-light-subtle">
                            <div class="title"><h5 class="mb-2">VAT Calculation Settings</h5></div>
                            <div class="text color-light-app"><p class="mb-0">Add or remove form fields and table coulmns</p></div>
                        </div>

                        <form action="{{ route('admin.'. $page['term'] .'.submit') }}" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
                            @csrf
                            <input type="hidden" name="setting_name" value="company">
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Generate Fields Name</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Select Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Select Sub Category
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Date Between
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Table Column Names</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Invoice Number
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Invoice To
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Date
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Amount
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Payment Status
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row align-items-center py-2 py-md-4 border-bottom border-light-subtle">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Report Download Options</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                PDF
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                CSV/Excel
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Pie Chart
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-center pt-2 pt-md-4 border-top1 border-light-subtle1">
                            {{--<div>
                                @include('includes.utils.session-alert')
                            </div>--}}
                            <div class="buttons d-flex flex-wrap align-items-center justify-content-center">
                                <input type="reset" value="Reset" class="btn btn-primary-app disabled">
                                <a href="{{ route('admin.settings') }}" type="button" class="btn btn-primary-app">Cancel</a>
                                <input type="submit" value="Save" class="btn btn-primary-app">
                            </div>
                        </div>
                    </div>
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

<script>
    $('.form-control-file input').on('change', function(e) {
        var el = $(this);
        var file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();

            reader.onload = function(event) {
                console.log(event);
                el.parent().find('.file-preview').attr('src', event.target.result).show();
            };

            reader.readAsDataURL(file);
        } else {
            el.parent().find('.file-preview').hide();
        }
    });
</script>
@endsection
