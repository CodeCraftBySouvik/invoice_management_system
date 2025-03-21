@extends('layouts.frontend')

@section('customcss')
@endsection

@section('content')

<!-- Checkout Success -->
<section class="about py-5" id="about">
    <div class="container">
        <div class="row align-items-center1">
            <div class="col-md-6">
                <img class="img-fluid mb-2 mb-md-0" src="{{ env('COMMON_HOST') . 'assets/frontend/img/checkout-success.svg' }}" alt="Image" width="677" height="738" loading="lazy" />
            </div>
            <div class="col-md-6">
                <h5 class="fw-medium text-body-emphasis text-center pb-2 mb-4">Let's Setup Your Company</h5>
                <form class="needs-validation w-350px mx-auto" novalidate="">
                    <div class="row g-2">
                        <div class="col-12 form-group">
                            <label for="company_name" class="form-label">Company Name</label>
                            <input type="text" class="form-control font-size-sm" id="company_name" name="company_name" placeholder="" required="">
                            <div class="invalid-feedback">
                                Please enter a valid company name.
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
                            <label for="area" class="form-label">Area</label>
                            <input type="text" class="form-control font-size-sm" id="city" name="area" placeholder="" required="">
                            <div class="invalid-feedback">
                                Please enter a area.
                            </div>
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="emirates" class="form-label">Emirates</label>
                            <select class="form-control form-select" aria-label="Emirates">
                                <option selected>Select Emirates</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter a valid zip code.
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="phone_number" class="form-label">Phone Number</label>
                            <input type="text" class="form-control font-size-sm" id="phone_number" name="phone_number" placeholder="" required="">
                            <div class="invalid-feedback">
                                Please enter a valid phone number.
                            </div>
                        </div>
                        <div class="col-12 form-group">
                            <label for="company_logo" class="form-label">Company Logo(optional)</label>
                            <div class="form-control-file d-flex align-items-center justify-content-center w-100">
                                <span>Upload here</span>
                                <input type="file" class="form-control font-size-sm" id="company_logo" name="company_logo" placeholder="" required="">
                                <img class="file-preview" src='' alt='preview' loading='lazy' style='display:none;'>
                            </div>
                            <div class="invalid-feedback">
                                Please enter a valid company logo.
                            </div>
                        </div>

                        <a class="btn-submit w-100 btn btn-primary-app font-size-sm mx-auto" href="{{ config('app.main_url') }}/dashboard" fdprocessedid="xaduq">Continue</a>
                        <!-- <button class="btn-submit w-100 btn btn-primary-app font-size-sm" type="submit" fdprocessedid="xaduq">Continue</button> -->
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <a href="{{ config('app.main_url') }}/dashboard" type="button" class="text-body-tertiary text-decoration-underline">Skip</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Success -->

@endsection

@section('customjs')
<script>
    // $(document).on('change', '.form-control-file input', function() {
    //     var filesCount = $(this)[0].files.length;
        
    //     var textbox = $(this).prev();
        
    //     if (filesCount === 1) {
    //         var fileName = $(this).val().split('\\').pop();
    //         textbox.text(fileName);
    //     } else {
    //         textbox.text(filesCount + ' files selected');
    //     }
    // });

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
