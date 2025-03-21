@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- Step Section -->
<section class="page-title pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <div class="steps mx-auto d-flex align-items-center justify-content-between">
                    <div class="step d-flex flex-column align-items-center justify-content-center position-relative">
                        <span class="number d-flex align-items-center justify-content-center rounded-circle bg-black text-white border border-dark mb-2">1</span>
                        <span class="label">Create account</span>
                    </div>
                    <div class="step d-flex flex-column align-items-center justify-content-center position-relative">
                        <span class="number d-flex align-items-center justify-content-center rounded-circle border border-dark mb-2">2</span>
                        <span class="label">Check out</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Step Section -->

<!-- Main Section -->
<section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="container container-inner mx-auto">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="fw-medium mb-2 pb-1 text-center">Create an Account</h5>
                            <div class="card rounded-1 border border-dark1 mb-2">
                                <div class="card-body p-3 p-md-5">
                                    <ul class="toggle-pills nav nav-pills mb-3 mx-auto" id="login-tab" role="tablist">
                                        <li class="nav-item flex-grow-1" role="presentation">
                                            <button class="nav-link text-dark w-100 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Use Email ID</button>
                                        </li>
                                        <li class="nav-item flex-grow-1" role="presentation">
                                            <button class="nav-link text-dark w-100" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Use Phone</button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                            <form class="needs-validation" novalidate="">
                                                <div class="row g-2">
                                                    <div class="col-12 form-group">
                                                        <label for="email" class="form-label">Email ID</label>
                                                        <input type="email" class="form-control font-size-sm" id="email" name="email" placeholder="example@gmail.com" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter a valid email.
                                                        </div>
                                                    </div>

                                                    <div class="col-12 form-group">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control font-size-sm" id="password" name="password" placeholder="xxxxxx" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter your password.
                                                        </div>
                                                    </div>

                                                    <a class="btn-submit w-100 btn btn-primary-app font-size-sm" href="{{ config('app.main_front_url') }}/checkout" fdprocessedid="xaduq">Continue</a>
                                                    <!-- <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit" fdprocessedid="xaduq">Continue</button> -->
                                                </div>
                                            </form>
                                            <p class="text-center color-gray-app pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>
                                        </div>
                                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                                            <form class="needs-validation" novalidate="">
                                                <div class="row g-2">
                                                    <div class="col-12 form-group">
                                                        <label for="phone" class="form-label">Phone Number</label>
                                                        <input type="phone" class="form-control font-size-sm" id="phone" name="phone" placeholder="+47 975474225" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter a valid phone number.
                                                        </div>
                                                    </div>

                                                    <div class="col-12 form-group">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" class="form-control font-size-sm" id="password" name="password" placeholder="xxxxxx" required="">
                                                        <div class="invalid-feedback">
                                                            Please enter your password.
                                                        </div>
                                                    </div>

                                                    <!-- <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit" fdprocessedid="xaduq">Continue</button> -->
                                                    <a class="btn-submit w-100 btn btn-primary-app font-size-sm" href="{{ config('app.main_front_url') }}/checkout" fdprocessedid="xaduq">Continue</a>
                                                </div>
                                            </form>
                                            <p class="text-center color-gray-app pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-medium mb-2 pb-1 text-center">Moments away to get this</h5>
                            <div class="card rounded-1 border border-dark1 mb-2">
                                <div class="card-body p-3 p-md-5">
                                    <ul class="list-group list-group-flush list-bulltet">
                                        <li class="list-group-item border-0 px-0"><img class="" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-check.svg' }}" alt="Image" width="14" height="14" loading="lazy" /> Customer Management</li>
                                        <li class="list-group-item border-0 px-0"><img class="" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-check.svg' }}" alt="Image" width="14" height="14" loading="lazy" /> Product Management</li>
                                        <li class="list-group-item border-0 px-0"><img class="" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-check.svg' }}" alt="Image" width="14" height="14" loading="lazy" /> Sales Management</li>
                                        <li class="list-group-item border-0 px-0"><img class="" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-check.svg' }}" alt="Image" width="14" height="14" loading="lazy" /> VAT Report Management</li>
                                    </ul>
                                    <p class="text-center color-gray-app pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mx-auto text-center py-5">
                            <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum porta.<br>Vivamus quis diam non orci vehicula cursus a id metus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Main Section -->

@endsection

@section('customjs')
@endsection
