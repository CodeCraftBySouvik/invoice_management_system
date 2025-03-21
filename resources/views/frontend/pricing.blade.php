@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- Page Title Section -->
<section class="page-title pt-4">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-12 mx-auto text-center">
                <h2 class="h4 fw-medium mb-3">Get Unlimited Control On <br>Your Business</h2>
                <p class="m-0">Customer Management | Product Management | Sales Management | VAT Report Management</p>
            </div>
        </div>
    </div>
</section>
<!-- End Page Title Section -->

<!-- Pricing Section -->
<section class="pricing py-3" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="pricing-buttons d-flex align-items-center justify-content-between mx-auto">
                    <div class="button d-flex align-items-center justify-content-center flex-grow-1 active" data-tier="month">
                        Monthly
                    </div>
                    <div class="button d-flex align-items-center justify-content-center flex-grow-1" data-tier="year">
                        Yearly
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card rounded-1 border border-dark mb-2 pricing-tier">
                    <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                        Free
                    </div>
                    <div class="card-body text-center px-4 py-4">
                        <p class="fw-normal mb-3 price">AED <span class="fs-4 fw-bold" data-tier-month="0.00" data-tier-year="0.00">0.00</span></p>
                        <p class="text-body-emphasis mb-5 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ante id eleifend congue. Donec velit ex, convallis et rhoncus in, rutrum a odio. Nulla rhoncus ipsum at nisi ultricies consequat. Morbi eu vestibulum quam. Duis ultrices nibh eget lorem scelerisque,</p>
                        <a href="{{ config('app.main_front_url') }}/setup" type="button" class="btn btn-primary-app w-100">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card rounded-1 border border-dark mb-2 pricing-tier">
                    <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                        Basic
                    </div>
                    <div class="card-body text-center px-4 py-4">
                        <p class="fw-normal mb-3 price">AED <span class="fs-4 fw-bold" data-tier-month="300.00" data-tier-year="3000.00">300.00</span></p>
                        <p class="text-body-emphasis mb-5 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ante id eleifend congue. Donec velit ex, convallis et rhoncus in, rutrum a odio. Nulla rhoncus ipsum at nisi ultricies consequat. Morbi eu vestibulum quam. Duis ultrices nibh eget lorem scelerisque,</p>
                        <a href="{{ config('app.main_front_url') }}/create-account" type="button" class="btn btn-primary-app w-100">Start Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card rounded-1 border border-dark mb-2 pricing-tier">
                    <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                        Advanced
                    </div>
                    <div class="card-body text-center px-4 py-4">
                        <p class="fw-normal mb-3 price">AED <span class="fs-4 fw-bold" data-tier-month="500.00" data-tier-year="5000.00">500.00</span></p>
                        <p class="text-body-emphasis mb-5 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ante id eleifend congue. Donec velit ex, convallis et rhoncus in, rutrum a odio. Nulla rhoncus ipsum at nisi ultricies consequat. Morbi eu vestibulum quam. Duis ultrices nibh eget lorem scelerisque,</p>
                        <a href="{{ config('app.main_front_url') }}/create-account" type="button" class="btn btn-primary-app w-100">Start Now</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card rounded-1 border border-dark mb-2 pricing-tier1">
                    <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                        Premium
                    </div>
                    <div class="card-body text-center px-4 py-4">
                        <p class="fw-normal mb-3"><span class="fs-4 fw-bold">Custom</span></p>
                        <p class="text-body-emphasis mb-5 px-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ante id eleifend congue. Donec velit ex, convallis et rhoncus in, rutrum a odio. Nulla rhoncus ipsum at nisi ultricies consequat. Morbi eu vestibulum quam. Duis ultrices nibh eget lorem scelerisque,</p>
                        <a href="{{ config('app.main_front_url') }}/create-account" type="button" class="btn btn-primary-app w-100">Start Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mx-auto text-center py-3">
                <p class="m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum porta.<br>Vivamus quis diam non orci vehicula cursus a id metus.</p>
            </div>
        </div>
    </div>
</section>
<!-- End About Section -->

@endsection

@section('customjs')
<script type="text/javascript">
    $('.pricing-buttons .button').click(function(){
        var el = $(this);
        var target = el.parents('section').find('.pricing-tier');

        el.parent().find('.button').removeClass('active');
        el.addClass('active');
        target.each(function(){
            var price = $(this).find('.price > span');
            var price_month = price.attr('data-tier-month');
            var price_year = price.attr('data-tier-year');
            // price.text(price_year);
            (el.attr('data-tier') == 'year') ? price.text(price_year) : price.text(price_month);
            // console.log(price_ + el.attr('data-tier'));
        });
    });
</script>
@endsection
