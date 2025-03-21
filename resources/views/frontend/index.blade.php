@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- Banner Section -->
<section class="banner" id="banner">
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-md-6 mx-auto text-center">
                <h1 class="display-4 fw-regular text-body-emphasis mb-5">Main Banner</h1>
                <a href="{{ config('app.main_front_url') }}/register" type="button" class="btn btn-primary-app me-md-1">Signup Now</a>
                <a href="{{ config('app.demo_url') }}" type="button" class="btn btn-primary-app ms-md-1">Play Demo</a>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Section -->

<!-- About Section -->
<section class="about py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img class="img-fluid mb-2 mb-md-0" src="{{ env('COMMON_HOST') . 'assets/frontend/img/img-placeholder.svg' }}" alt="Image" width="770" height="480" loading="lazy" />
            </div>
            <div class="col-md-6">
                <h2 class="fw-normal text-body-emphasis mb-1">About</h2>
                <p class="text-body-emphasis">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <p class="text-body-emphasis">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- Pricing Section -->
<section class="pricing py-5" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="fw-normal text-body-emphasis mb-3 text-center">Price</h2>
            </div>
            <div class="col-md-4">
                <div class="card bg-light rounded-0 border-0 px-5 py-2 mb-2">
                    <div class="card-body text-center">
                        <h4 class="card-title fw-normal mb-2">Free</h4>
                        <p class="h4 fw-normal mb-3">$ 0.00</p>
                        <p class="text-body-emphasis mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{ config('app.main_front_url') }}/setup" type="button" class="btn btn-primary-app ms-md-1">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light rounded-0 border-0 px-5 py-2 mb-2">
                    <div class="card-body text-center">
                        <h4 class="card-title fw-normal mb-2">Basic</h4>
                        <p class="h4 fw-normal mb-3">$ 5.00</p>
                        <p class="text-body-emphasis mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{ config('app.main_front_url') }}/create-account" type="button" class="btn btn-primary-app ms-md-1">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-light rounded-0 border-0 px-5 py-2 mb-2">
                    <div class="card-body text-center">
                        <h4 class="card-title fw-normal mb-2">Advanced</h4>
                        <p class="h4 fw-normal mb-3">$ 10.00</p>
                        <p class="text-body-emphasis mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                        <a href="{{ config('app.main_front_url') }}/create-account" type="button" class="btn btn-primary-app ms-md-1">Start Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

<!-- Newsletter Section -->
<section class="newsletter py-2" id="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/img-placeholder-newsletter.svg' }}" alt="Image" width="1568" height="248" loading="lazy" />
            </div>
        </div>
    </div>
</section>
<!-- End Newsletter Section -->

@endsection

@section('customjs')
@endsection
