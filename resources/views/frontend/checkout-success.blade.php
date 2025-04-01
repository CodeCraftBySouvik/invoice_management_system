@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- Checkout Success -->
<section class="about py-5" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <img class="img-fluid mb-2 mb-md-0" src="{{ env('COMMON_HOST') . 'assets/frontend/img/checkout-success.svg' }}" alt="Image" width="677" height="738" loading="lazy" />
            </div>
            <div class="col-md-6 text-center">
                <img class="img-fluid mb-3 mb-md-4" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-trophy.svg' }}" alt="Image" width="151" height="151" loading="lazy" />
                <h5 class="fw-medium text-body-emphasis pb-2 mb-4">The payment has successfully completed</h5>
                <p class="text-body-emphasis mb-5">Let's proceed to setup company and <br>other information</p>

                <div class="">
                    <a href="{{route('setup')}}" type="button" class="btn btn-primary-app mx-auto btn-350 mb-3">Proceed Now</a>
                </div>
                <div class="">
                    <a href="" type="button" class="text-body-tertiary text-decoration-underline">Skip</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Success -->

@endsection

@section('customjs')
@endsection
