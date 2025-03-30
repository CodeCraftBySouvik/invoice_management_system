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
                                    <form id="payment-form" class="needs-validation" novalidate="">
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
                                                            <input type="radio" class="form-check-input radio font-size-sm payment-method" id="payment_gateway-1" name="payment_gateway" value="card" placeholder="" required="" checked>
                                                            <label for="payment_gateway-1" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                                <span>Credit or Debit Card</span>
                                                                <div class="images d-flex align-items-center justify-content-end g-6">
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-visa.svg' }}" alt="Icon" width="37" height="18" loading="lazy" />
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-mc.svg' }}" alt="Icon" width="30" height="18" loading="lazy" />
                                                                    <img class="img-fluid" src="{{ env('COMMON_HOST') . 'assets/frontend/img/icon-p-amx.svg' }}" alt="Icon" width="40" height="18" loading="lazy" />
                                                                </div>
                                                            </label>
                                                        </div>
                                                        <div id="card-fields" class="payment_gateway_fields active" style="display: block;">
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
                                                        <input type="radio" class="form-check-input radio font-size-sm payment-method" id="payment_gateway-2" name="payment_gateway" value="stripe" placeholder="" required="">
                                                        <label for="payment_gateway-2" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                            <span>Stripe</span>
                                                            <div class="images d-flex align-items-center justify-content-end g-6">
                                                                <img class="img-fluid" src="" alt="Icon" width="45" height="18" loading="lazy" />
                                                            </div>
                                                        </label>
                                                    </div>
                                                    <div id="stripe-fields" class="payment-method-fields active" style="display: none;">
                                                        <div class="row">
                                                            <div class="col-md-12 form-group pb-25">
                                                                <label for="card-element" class="form-label">Card Details</label>
                                                                <div id="card-element" class="form-control"></div>
                                                                <div id="card-errors" role="alert"></div>
                                                            </div>
                                                        </div>
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
                                                <input type="radio" class="form-check-input radio font-size-sm" id="billing_cycle-1" name="billing_cycle" placeholder="" required="" value="monthly" {{$page['data']['attempt_package_type'] == 'monthly' ? 'checked' : ''}}>
                                                <label for="billing_cycle-1" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                    <span>Monthly</span>
                                                    <span>AED {{$page['package']['monthly_price']}}/m</span>
                                                </label>
                                            </div>
                                            <div class="form-check d-flex align-items-center justify-content-between w-100 billing_cycle pb-3 g-12">
                                                <input type="radio" class="form-check-input radio font-size-sm" id="billing_cycle-2" name="billing_cycle" placeholder="" required="" value="yearly" {{$page['data']['attempt_package_type'] == 'yearly' ? 'checked' : ''}}>
                                                <label for="billing_cycle-2" class="form-check-label w-100 d-flex align-items-center justify-content-between m-0">
                                                    <span>Yearly</span>
                                                    <span>AED {{$page['package']['yearly_price']}}/y</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    @if($page['data']['attempt_package_type'] == 'monthly')
                                    <p class="fw-medium mb-4 pb-1">Monthly Subscription</p>
                                    <div class="mb-2 border-bottom">
                                        <div class="subtotal">
                                            <label for="subtotal-1" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>Price</span>
                                                <span id="price-value">AED {{$page['package']['monthly_price']}}/month</span>
                                            </label>
                                            <label for="subtotal-2" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>VAT</span>
                                                <span id="vat-value">AED {{$page['vat']}}/month</span>
                                            </label>
                                        </div>
                                    </div>
                                     @php
                                        $total = $page['package']['monthly_price'] + $page['vat'];
                                     @endphp
                                    @else
                                    <p class="fw-medium mb-4 pb-1">Yearly Subscription</p>
                                    <div class="mb-2 border-bottom">
                                        <div class="subtotal">
                                            <label for="subtotal-1" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>Price</span>
                                                <span id="price-value">AED {{$page['package']['yearly_price']}}/year</span>
                                            </label>
                                            <label for="subtotal-2" class="form-check-label w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>VAT</span>
                                                <span id="vat-value">AED {{$page['vat']}}/year</span>
                                            </label>
                                        </div>
                                    </div>
                                    @php
                                        $total = $page['package']['yearly_price'] + $page['vat'];
                                     @endphp
                                    @endif


                                    <div class="border-bottom">
                                        <div class="total">
                                            <label for="total-1" class="form-check-label fw-semibold w-100 d-flex align-items-center justify-content-between w-100 pb-3 m-0 g-12">
                                                <span>Total</span>
                                                <span id="total-value">AED {{ number_format($total,2) }} /{{ $page['data']['attempt_package_type'] == 'monthly' ? 'month' : 'year' }}</span>
                                            </label>
                                        </div>
                                    </div>

                                    <p class="text-center color-gray-app pt-5 pb-4 mb-1">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed nec erat a metus interdum</p>

                                    <a href="" type="button" class="btn btn-primary-app w-100 disabled1" id="complete-order">Complete Order</a>
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
<script src="https://js.stripe.com/acacia/stripe.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const monthlyRadio = document.getElementById("billing_cycle-1");
        const yearlyRadio = document.getElementById("billing_cycle-2");

        const priceLabel = document.getElementById("price-value");
        const vatLabel = document.getElementById("vat-value");
        const totalLabel = document.getElementById("total-value");

        const monthlyPrice = parseFloat("{{ $page['package']['monthly_price'] }}");
        const yearlyPrice = parseFloat("{{ $page['package']['yearly_price'] }}");
        const vatAmount = parseFloat("{{ $page['vat'] }}");

        function updatePrice() {
            let selectedPrice = monthlyRadio.checked ? monthlyPrice : yearlyPrice;
            let totalAmount = selectedPrice + vatAmount;
            
            // Update HTML content dynamically
            priceLabel.innerText = `AED ${selectedPrice.toFixed(2)}/${monthlyRadio.checked ? 'month' : 'year'}`;
            vatLabel.innerText = `AED ${vatAmount.toFixed(2)}/${monthlyRadio.checked ? 'month' : 'year'}`;
            totalLabel.innerText = `AED ${totalAmount.toFixed(2)}/${monthlyRadio.checked ? 'month' : 'year'}`;
        }

        // Attach event listeners to the radio buttons
        if (priceLabel && vatLabel && totalLabel) {
            monthlyRadio.addEventListener("change", updatePrice);
            yearlyRadio.addEventListener("change", updatePrice);
            updatePrice(); // Ensure initial update
        } else {
            console.error("Price, VAT, or Total elements not found.");
        }

         // Payment method toggle
         const paymentMethods = document.querySelectorAll('.payment-method');
   
            paymentMethods.forEach(method => {
                    method.addEventListener('change', function() {
                        document.getElementById('card-fields').style.display = 'none';
                        document.getElementById('stripe-fields').style.display = 'none';

                        if (this.value === 'card') {
                            document.getElementById('card-fields').style.display = 'block';
                        } else if (this.value === 'stripe') {
                            document.getElementById('stripe-fields').style.display = 'block';
                        }
                    });
                });

            var stripe = Stripe("{{env('STRIPE_PUBLISHABLE_KEY')}}");
            var elements = stripe.elements();
            var cardElement = elements.create('card',{
                style: {
                        base: {
                            fontSize: '16px',
                            color: '#32325d',
                            '::placeholder': {
                                color: '#aab7c4'
                            }
                        },
                        invalid: {
                            color: '#fa755a',
                            iconColor: '#fa755a'
                        }
                    }
            });
            cardElement.mount('#card-element');
            const form = document.getElementById('payment-form');
            const completeOrderBtn = document.getElementById('complete-order');

            completeOrderBtn.addEventListener('click', async function(e) {
                e.preventDefault();

        

            // Validate form
            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }
            
            // Disable button to prevent multiple submissions
            completeOrderBtn.disabled = true;
            completeOrderBtn.textContent = 'Processing...';

            // Get billing cycle and payment method
            const billingCycle = document.querySelector('input[name="billing_cycle"]:checked')?.value;
                    const paymentMethod = document.querySelector('input[name="payment_gateway"]:checked')?.value;

                    if (!billingCycle || !paymentMethod) {
                        alert("Please select billing cycle and payment method");
                        return;
                    }

                    const amount = billingCycle === 'monthly' ? monthlyPrice + vatAmount : yearlyPrice + vatAmount;
                    // console.log(`Billing Cycle: ${billingCycle}\nPayment Method: ${paymentMethod}\nAmount: AED ${amount.toFixed(2)}`);
                    try {
                        // Prepare payment data
                    const paymentData = {
                    amount: Math.round(amount * 100), // Convert to cents
                    package_id: "{{ $page['data']['package_id'] }}",
                    billing_cycle: billingCycle,
                    name: document.getElementById('name').value,
                    company_name: document.getElementById('company_name').value,
                    country: document.getElementById('country').value,
                    address: document.getElementById('address').value,
                    city: document.getElementById('city').value,
                    zip_code: document.getElementById('zip_code').value,
                    trn_number: document.getElementById('trn_number').value,
                    security_code : document.getElementById('security_code').value
                };
                // console.log(paymentData);
                let response;
                if (paymentMethod === 'card') {
                    // Direct card payment
                    paymentData.card_number = document.getElementById('card_number').value;
                    paymentData.expiry_month = document.getElementById('expiry_month').value;
                    paymentData.expiry_year = document.getElementById('expiry_year').value;
                    paymentData.security_code = document.getElementById('security_code').value;

                    response = await fetch("{{ route('process-card-payment') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(paymentData)
                    });
                } else {
                    // Stripe Elements payment
                    const { paymentMethod, error } = await stripe.createPaymentMethod({
                        type: 'card',
                        card: cardElement,
                        billing_details: {
                            name: paymentData.name,
                            address: {
                                line1: paymentData.address,
                                city: paymentData.city,
                                postal_code: paymentData.zip_code,
                                country: paymentData.country
                            }
                        }
                    });

                    if (error) {
                        throw new Error(error.message);
                    }

                    paymentData.payment_method_id = paymentMethod.id;

                    response = await fetch("{{ route('process-stripe-payment') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        body: JSON.stringify(paymentData)
                    });
                }
              
            }catch(error){
                alert(error);
            }

            });
    }); 
</script>
<script>
    
</script>

@endsection
