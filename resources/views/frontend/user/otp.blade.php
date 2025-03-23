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
                <img class="img-fluid mb-5 mb-md-0" src="{{ asset('/assets/frontend/checkout-success.svg') }}" alt="Image" width="677" height="738" loading="lazy" />
            </div>
            <div class="col-md-6">
                <div class="w-350px mx-auto">
                    <div class="h-30px"></div>
                     
                    <h5 class="fw-medium mb-4 text-center">Verify Your Identity</h5>
                    @if (isset($user->email))
                       <p class="text-body-emphasis text-center mb-2">We sent a 6 digit code to {{$user->email}}, this code will valid for next 1 minutes</p>
                       <a href="{{route('register')}}" class="text-center color-primary-app fw-medium text-center text-decoration-underline mb-3 pb-2" style="margin-left: 97px;">Change email ID</a>
                    @elseif(isset($user->mobile_number))
                          <p class="text-body-emphasis text-center mb-2">We sent a 6 digit code to your {{$user->mobile_number}}, this code will valid for next 1 minutes</p>
                       <a href="{{route('register')}}" class="text-center color-primary-app fw-medium text-center text-decoration-underline mb-3 pb-2" style="margin-left: 97px;">Change mobile number</a>
                    @endif

                    <div class="card border-0">
                        <div class="card-body p-0">
                            <form method="POST" action="{{ route('otp.submit') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                            @csrf
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <input type="tel" class="form-control font-size-sm @error('otp') is-invalid @enderror" id="otp" name="otp" placeholder="" required="" value="{{ old('otp') }}">
                                        @include('includes.utils.field-validation', ['field' => 'otp', 'message' => 'Please enter OTP'])
                                        @error('otp') <p class="text-danger">{{$message}}</p>@enderror
                                    </div>
                                    <input type="hidden" name="remember_token" value="{{$token}}">
                                    <div class="col-12">
                                        <button class="btn-submit w-100 btn btn-primary-app font-size-sm main-btn" type="submit">Continue</button>
                                    </div>
                                </div>
                            </form>
                            <form method="POST" action="{{ route('resend-otp') }}" enctype="multipart/form-data" class="needs-validation" novalidate="">
                                @csrf
                                <input type="hidden" name="remember_token" value="{{$token}}">
                                <div class="pt-1 mt-3">
                                    <button class="btn-submit w-100 btn btn-primary-app font-size-sm disabled resend-btn">Resend Code <span class="timer">(0:59)</span></button>
                                </div>
                            </form>
                            <p class="text-center color-gray-app pt-3 m-0">By pressing Continue you agree to <span class="text-black fw-medium">Term of Service and Privacy Policy</span></p>
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
<script type="text/javascript">
    $(document).ready(function() {
        let time = 59;

        let countdown = setInterval(function() {
            let minutes = Math.floor(time / 60);
            let seconds = time % 60;

            $('.resend-btn .timer').text('(' + `${minutes}:${seconds < 10 ? '0' : ''}${seconds}` + ')');

            if (time === 0) {
                clearInterval(countdown);
                $('.resend-btn').removeClass('disabled').find('.timer').text('');
                $('.main-btn').addClass('disabled');
                // alert("Time's up!");
            }

            time--;
        }, 1000); // Update every second
    });

  
</script>

@endsection
