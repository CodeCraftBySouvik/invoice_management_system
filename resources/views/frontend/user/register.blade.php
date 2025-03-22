@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- UI Final -->
<!-- Register -->
<section class="register py-2 py-md-5" id="register">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid mb-5 mb-md-0" src="{{ asset('frontend/img/checkout-success.svg') }}" alt="Image" width="677" height="738" loading="lazy" />
            </div>
            <div class="col-md-6">
                <div class="w-350px mx-auto">
                    <div class="h-30px"></div>
                    <h5 class="fw-medium mb-4 mb-md-5 text-center">Signup or Register</h5>
                    <div class="card border-0">
                        <div class="card-body p-0">
                            <ul class="toggle-pills nav nav-pills mb-4 mx-auto" id="login-tab" role="tablist">
                                <li class="nav-item flex-grow-1" role="presentation">
                                    <button class="nav-link text-dark w-100 active" id="pills-tab-1" data-bs-toggle="pill" data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1" aria-selected="true">Use Email ID</button>
                                </li>
                                <li class="nav-item flex-grow-1" role="presentation">
                                    <button class="nav-link text-dark w-100" id="pills-tab-2" data-bs-toggle="pill" data-bs-target="#pills-2" type="button" role="tab" aria-controls="pills-2" aria-selected="false">Use Phone</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-3" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-tab-1" tabindex="0">
                                    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    <input type="hidden" name="form-name" value="withEmail">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="email" class="form-label">Email ID</label>
                                                <input type="email" class="form-control font-size-sm @error('email') is-invalid @enderror" id="email-1" name="email" placeholder="" required="" value="{{ old('email') }}">
                                                @include('includes.utils.field-validation', ['field' => 'email', 'message' => 'Please enter a valid email ID'])
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control font-size-sm @error('password') is-invalid @enderror" id="password" name="password" placeholder="" required="" value="{{ old('password') }}">
                                                @include('includes.utils.field-validation', ['field' => 'password', 'message' => 'Please enter your password'])
                                            </div>

                                            <div class="col-12">
                                                <!-- <a class="btn-submit w-100 btn btn-primary-app font-size-sm" href="{{ route('checkout') }}">Start Now</a> -->
                                                <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit">Start Now</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-center color-gray-app pt-3 m-0">We will send an <span class="text-black fw-medium">OTP</span> to verify your identity</p>
                                </div>
                                <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-tab-2" tabindex="0">
                                    <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                    @csrf
                                    <input type="hidden" name="form-name" value="withMobile">
                                        <div class="row">
                                            <div class="col-12 form-group">
                                                <label for="mobile" class="form-label">Phone Number</label>
                                                <input type="tel" class="form-control font-size-sm @error('mobile') is-invalid @enderror" id="mobile-2" name="mobile" placeholder="" required="" value="{{ old('mobile') }}">
                                                @include('includes.utils.field-validation', ['field' => 'mobile', 'message' => 'Please enter a valid phone number'])
                                            </div>

                                            <div class="col-12 form-group">
                                                <label for="password" class="form-label">Password</label>
                                                <input type="password" class="form-control font-size-sm 
                                                @error('password') is-invalid @enderror" id="password" name="password" placeholder="" required="" value="{{ old('password') }}">
                                                @include('includes.utils.field-validation', ['field' => 'password', 'message' => 'Please enter your password'])
                                            </div>

                                            <div class="col-12">
                                                <!-- <a class="btn-submit w-100 btn btn-primary-app font-size-sm" href="{{ route('checkout') }}">Start Now</a> -->
                                                <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit">Start Now</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p class="text-center color-gray-app pt-3 m-0">We will send an <span class="text-black fw-medium">OTP</span> to verify your identity</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Register -->

@endsection

@section('customjs')
@endsection
