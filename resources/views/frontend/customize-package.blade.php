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

<section class="pt-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center nav-link btn btn-primary-app dark">
                        <h5 class="m-0">Customize Your Package</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('package-customize-store') }}" method="POST">
                            @csrf

                            <!-- Package Name -->
                            <div class="mb-3">
                                <label class="form-label">Package Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"  placeholder="Enter package name">
                                @error('name') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <!--Monthly Price -->
                            <div class="mb-3">
                                <label class="form-label">Price(Monthly) <small>(Leave empty for custom pricing)</small></label>
                                <input type="number" name="monthly_price" class="form-control"  value="{{ old('monthly_price') }}" placeholder="Enter price">
                                @error('monthly_price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            {{-- Yearly Yrice --}}
                            <div class="mb-3">
                                <label class="form-label">Price(Yearly) <small>(Leave empty for custom pricing)</small></label>
                                <input type="number" name="yearly_price" class="form-control"  value="{{ old('yearly_price') }}" placeholder="Enter price">
                                @error('yearly_price') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            {{-- <!-- Billing Cycle -->
                            <div class="mb-3">
                                <label class="form-label">Billing Cycle</label>
                                <select name="billing_cycle" class="form-control" >
                                    <option hidden value="">--select--</option>
                                    <option value="monthly" {{ old('billing_cycle') == 'monthly' ? 'selected' : '' }}>Monthly</option>
                                    <option value="yearly" {{ old('billing_cycle') == 'yearly' ? 'selected' : '' }}>Yearly</option>
                                </select>
                                @error('billing_cycle') <p class="text-danger">{{ $message }}</p> @enderror
                            </div> --}}

                            <!-- Description -->
                            <div class="mb-3">
                                <label class="form-label">Package Description</label>
                              <textarea class="form-control" name="description" cols="3" rows="3">{{ old('description') }}</textarea>
                                @error('description') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>
                            
                            <!-- Currency -->
                            <div class="mb-3">
                                <label class="form-label">Currency <small>(Leave empty for AED)</small></label>
                                <input type="text" name="currency" class="form-control" value="{{ old('currency') }}" placeholder="Enter Currency Name">
                                @error('currency') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <!-- Button Text -->
                            <div class="mb-3">
                                <label class="form-label">Button Text</label>
                                <input type="text" name="button_text" class="form-control" value="{{ old('button_text') }}" placeholder="Enter Button Text">
                                @error('button_text') <p class="text-danger">{{ $message }}</p> @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="nav-link btn btn-primary-app dark">Save Package</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('customjs')

@endsection