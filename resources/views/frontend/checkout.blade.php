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
                        <span class="number d-flex align-items-center justify-content-center rounded-circle border border-dark mb-2">1</span>
                        <span class="label">Create account</span>
                    </div>
                    <div class="step d-flex flex-column align-items-center justify-content-center position-relative">
                        <span class="number d-flex align-items-center justify-content-center rounded-circle bg-black text-white border border-dark mb-2">2</span>
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
                            <h5 class="fw-medium mb-2 pb-1 text-center">Checkout</h5>
                            <div class="card rounded-1 border border-dark1 mb-2">
                                <div class="card-body p-3 p-md-5">
                                    <form class="needs-validation" novalidate="">
                                        <div class="row g-2">
                                            <div class="col-12 form-group">
                                                <label for="name" class="form-label">Your Name</label>
                                                <input type="text" class="form-control font-size-sm" id="name" name="name" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid name.
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="company_name" class="form-label">Company Name</label>
                                                <input type="text" class="form-control font-size-sm" id="company_name" name="company_name" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid company name.
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="country" class="form-label">Country</label>
                                                <input type="text" class="form-control font-size-sm" id="country" name="country" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid country.
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control font-size-sm" id="address" name="address" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid address.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="city" class="form-label">City</label>
                                                <input type="text" class="form-control font-size-sm" id="city" name="city" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid city.
                                                </div>
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label for="zip_code" class="form-label">Zip Code</label>
                                                <input type="text" class="form-control font-size-sm" id="zip_code" name="zip_code" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid zip code.
                                                </div>
                                            </div>
                                            <div class="col-12 form-group">
                                                <label for="trn_number" class="form-label">TRN Number</label>
                                                <input type="text" class="form-control font-size-sm" id="trn_number" name="trn_number" placeholder="" required="">
                                                <div class="invalid-feedback">
                                                    Please enter a valid TRN number.
                                                </div>
                                            </div>

                                            <div class="col-12 form-group">
                                                <div class="payment_gateways">
                                                    <div class="payment_gateway py-3 border-bottom">
                                                        <div class="form-check d-flex align-items-center justify-content-between w-100 payment_gateway py-3 border-bottom g-12">
                                                            <input type="radio" class="form-check-input radio font-size-sm" id="payment_gateway-1" name="payment_gateway" placeholder="" required="" checked>
                                                            <label for="payment_gateway-1" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                                <span>Credit or Debit Card</span>
                                                                <div class="images d-flex align-items-center justify-content-end g-6">
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-visa.svg' }}" alt="Icon" width="37" height="18" loading="lazy" />
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-mc.svg' }}" alt="Icon" width="30" height="18" loading="lazy" />
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-amx.svg' }}" alt="Icon" width="40" height="18" loading="lazy" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div class="payment_gateway_fields">
                                                            <div class="row">
                                                                <div class="col-md-12 form-group pb-25">
                                                                    <label for="card_number" class="form-label">Card Number</label>
                                                                    <input type="text" class="form-control font-size-sm" id="card_number" name="card_number" placeholder="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid card number.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 form-group pb-25">
                                                                    <label for="expiry_month" class="form-label">Expiry Month</label>
                                                                    <input type="text" class="form-control font-size-sm" id="expiry_month" name="expiry_month" placeholder="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid expiry month.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 form-group pb-25">
                                                                    <label for="expiry_year" class="form-label">Expiry Year</label>
                                                                    <input type="text" class="form-control font-size-sm" id="expiry_year" name="expiry_year" placeholder="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid expiry year.
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 form-group pb-25">
                                                                    <label for="security_code" class="form-label">Security Code</label>
                                                                    <input type="text" class="form-control font-size-sm" id="security_code" name="security_code" placeholder="" required="">
                                                                    <div class="invalid-feedback">
                                                                        Please enter a valid security code.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check d-flex align-items-center justify-content-between w-100 payment_gateway py-3 border-bottom g-12">
                                                        <input type="radio" class="form-check-input radio font-size-sm" id="payment_gateway-2" name="payment_gateway" placeholder="" required="">
                                                        <label for="payment_gateway-2" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                            <span>PayPal</span>
                                                            <div class="images d-flex align-items-center justify-content-end g-6">
                                                                <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-paypal.svg' }}" alt="Icon" width="45" height="18" loading="lazy" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit" fdprocessedid="xaduq">Continue</button> -->
                                        </div>
                                    </form>
                                    <p class="text-center color-gray-app pt-3 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5 class="fw-medium mb-2 pb-1 text-center">Order Summery</h5>
                            <div class="card rounded-1 border border-dark1 mb-2">
                                <div class="card-body p-3 p-md-5">
                                    <p class="fw-medium mb-4 pb-1">Billing Cycle:</p>
                                    <div class="form-group mb-4 border-bottom">
                                        <div class="billing_cycles">
                                            <div class="form-check d-flex align-items-center justify-content-between w-100 billing_cycle pb-3 g-12">
                                                <input type="radio" class="form-check-input radio font-size-sm" id="billing_cycle-1" name="billing_cycle" placeholder="" required="" value="monthly" {{$page['tier'] == 'monthly' ? 'checked' : ''}}>
                                                <label for="billing_cycle-1" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                    <span>Monthly</span>
                                                    <span>{{$page['package']['currency']}} {{$page['tier'] == 'monthly' ? intval($page['package']['price']) : 0}}/m</span>
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center justify-content-between w-100 billing_cycle pb-3 g-12">
                                                <input type="radio" class="form-check-input radio font-size-sm" id="billing_cycle-2" name="billing_cycle" placeholder="" required="">
                                                <label for="billing_cycle-2" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                    <span>Yearly</span>
                                                    <span>{{$page['package']['currency']}} {{$page['tier'] =='yearly' ? intval($page['package']['price']) : 0}}/m</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <p class="fw-medium mb-4 pb-1">Yearly Subscription</p>
                                    <div class="mb-2 border-bottom">
                                        <div class="subtotal">
                                            <label for="subtotal-1" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>Price</span>
                                                <span>{{intval($page['package']['price'] * 12)}}/year</span>
                                            </label>
                                            <label for="subtotal-2" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>VAT</span>
                                                <span>AED 0/year</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="border-bottom">
                                        <div class="total">
                                            <label for="total-1" class="form-check-label fw-semibold w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>Total</span>
                                                <span>AED /year</span>
                                            </label>
                                        </div>
                                    </div>

                                    <p class="text-center color-gray-app pt-5 pb-4 mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>

                                    <a href="{{ config('app.main_front_url') }}/checkout/success" type="button" class="btn btn-primary-app w-100 disabled1">Complete Order</a>
                                </div>
                            </div>
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
