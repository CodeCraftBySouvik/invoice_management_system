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
                    <div class="button d-flex align-items-center justify-content-center flex-grow-1 active" data-tier="monthly">
                        Monthly
                    </div>
                    <div class="button d-flex align-items-center justify-content-center flex-grow-1" data-tier="yearly">
                        Yearly
                    </div>
                </div>
            </div>

            <!-- Monthly Packages -->

                @forelse($monthly_package as $item)
                <div class="col-md-3 pricing-tier monthly active">
                    <div class="card rounded-1 border border-dark mb-2">
                        <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                            {{ ucwords($item->name) }}
                        </div>
                        <div class="card-body text-center px-4 py-4">
                            <p class="fw-normal mb-3 price">
                                {{  $item->currency }} 
                                <span class="fs-4 fw-bold">{{ $item->monthly_price }}</span>
                            </p>
                            <p class="text-body-emphasis mb-5 px-4">{{ $item->description }}</p>
                            <button data-package_id="{{$item->id}}" data-package_type="monthly" data-package_amount="{{$item->monthly_price}}" type="button" class="btn btn-primary-app w-100 save-package">
                            {{ $item->button_text }}
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-3 pricing-tier monthly active">
                    <div class="card rounded-1 border border-dark mb-2">
                        <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center"></div>
                        <div class="card-body text-center px-4 py-4">
                            <p class="fw-normal mb-3 price"><span class="fs-4 fw-bold"></span></p>
                            <p class="text-body-emphasis mb-5 px-4">No package available in monthly</p>
                            <a href="javascript:void(0);" type="button" class="btn btn-primary-app w-100"></a>
                        </div>
                    </div>
                </div>
                @endforelse


            <!-- Yearly Packages -->

                @forelse($yearly_package as $item)
                <div class="col-md-3 pricing-tier yearly">
                    <div class="card rounded-1 border border-dark mb-2">
                        <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center">
                            {{ ucwords($item->name) }}
                        </div>
                        <div class="card-body text-center px-4 py-4">
                            <p class="fw-normal mb-3 price">
                                {{ $item->currency }} 
                                <span class="fs-4 fw-bold">{{ $item->yearly_price }}</span>
                            </p>
                            <p class="text-body-emphasis mb-5 px-4">{{ $item->description }}</p>
                            <button data-package_id="{{$item->id}}" data-package_amount="{{$item->yearly_price}}" data-package_type="yearly" type="button" class="btn btn-primary-app w-100 save-package">
                             {{ $item->button_text }}
                            </button>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-3 pricing-tier yearly">
                    <div class="card rounded-1 border border-dark mb-2">
                        <div class="card-header p-2 rounded-1 border-0 bg-black color-primary-app text-center"></div>
                        <div class="card-body text-center px-4 py-4">
                            <p class="fw-normal mb-3 price"><span class="fs-4 fw-bold"></span></p>
                            <p class="text-body-emphasis mb-5 px-4">No package available in yearly</p>
                            <a href="javascript:void(0);" type="button" class="btn btn-primary-app w-100"></a>
                        </div>
                    </div>
                </div>
                @endforelse

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
    // $('.pricing-buttons .button').click(function(){
    //     var el = $(this);
    //     var target = el.parents('section').find('.pricing-tier');

    //     el.parent().find('.button').removeClass('active');
    //     el.addClass('active');
    //     target.each(function(){
    //         var price = $(this).find('.price > span');
    //         var price_month = price.attr('data-tier-month');
    //         var price_year = price.attr('data-tier-year');
    //         // price.text(price_year);
    //         (el.attr('data-tier') == 'year') ? price.text(price_year) : price.text(price_month);
    //         // console.log(price_ + el.attr('data-tier'));
    //     });
    // });

    $(document).ready(function() {
    $(".pricing-buttons .button").click(function() {
        var selectedTier = $(this).attr("data-tier");

        // Remove active class from all buttons and add to the selected one
        $(".pricing-buttons .button").removeClass("active");
        $(this).addClass("active");

        // Hide all pricing tiers and show only the selected one
        $(".pricing-tier").hide();
        $(".pricing-tier." + selectedTier).fadeIn();
    });

    // Show the monthly plans by default
    $(".pricing-tier.yearly").hide();


    //checkout section
    $('.save-package').on('click', function() {
        let package_id = $(this).data('package_id');
        let package_type = $(this).data('package_type');
        let package_amount = $(this).data('package_amount');
        

        $.ajax({
            url: "{{ route('start-checkout') }}",  // Replace with your actual route
            type: "POST",
            data: {
                package_id: package_id,
                package_type: package_type,
                package_amount: package_amount,
                _token: "{{ csrf_token() }}"
            },
            beforeSend: function() {
                console.log("Saving package...");
            },
            success: function(response) {
                // console.log(response.status === 'success')

                if(response.status === 'success'){
                    window.location.href=response.url;
                }
            },
            error: function(xhr) {
                alert("Error: " + xhr.responseJSON.message);  // Show error message
            }
        });
    });

});


   
    
</script>
@endsection
