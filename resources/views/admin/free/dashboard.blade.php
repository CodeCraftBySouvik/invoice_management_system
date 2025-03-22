@extends('layouts.admin')

@section('customcss')
<link href='https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' rel='stylesheet'>
@endsection

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <form action="" name="add_{{ $page['term'] }}" id="add_{{ $page['term'] }}" method="post" enctype="multipart/form-data" class="needs-validation" novalidate=''>
            @csrf
            <input type="hidden" name="content_type" value="{{$page['term']}}">

            <div class="box py-2 py-md-4">

                <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pb-2 pb-md-4 border-bottom border-light-subtle">
                    <div class="title">
                        <h5 class="mb-2 mb-md-0">Add {{ ucfirst($page['term']) }}</h5>
                    </div>
                    <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                        <button type="button" class="btn btn-primary-app btn-outline">Free Trial</button>
                    </div>
                </div>

                <div class="row py-2 py-md-4">
                    <div class="col-md-4">
                        <div class="form-group m-0">
                            <!-- <label for="company_logo" class="form-label">Company Logo(optional)</label> -->
                            <div class="form-control-file d-flex align-items-center justify-content-center w-100">
                                <span>+ Add Logo</span>
                                <input type="file" class="form-control font-size-sm" id="company_logo" name="company_logo" placeholder="">
                                <img class="file-preview" src='' alt='preview' loading='lazy' style='display:none;z-index:1;'>
                            </div>
                            <div class="invalid-feedback">
                                Please enter a valid company logo.
                            </div>
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group m-0">
    				        <label>Invoice Number</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_number" value="{{ old('invoice_number') ?? '' }}" required>
					    </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group m-0">
    				        <label>Date</label>
						    <input type="text" class="form-control date" placeholder="" name="date" value="{{ old('date') ?? '' }}" required>
                        </div>
    				</div>
                </div>

                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <div class="col-md-4">
    				    <div class="form-group m-0">
    				        <label>Invoice From</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_from" value="{{ old('invoice_from') ?? '' }}" required>
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group m-0">
    				        <label>Address</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_from_address" value="{{ old('invoice_from_address') ?? '' }}" required>
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group m-0">
    				        <label>TRN - VAT Number</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_from_trn_vat_number" value="{{ old('invoice_from_trn_vat_number') ?? '' }}">
					    </div>
    				</div>
                </div>
                
                <!-- New Row -->
                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Invoice To</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_to" value="{{ old('invoice_to') ?? '' }}" required>
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>Address</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_to_address" value="{{ old('invoice_to_address') ?? '' }}" required>
                        </div>
    				</div>
                    <div class="col-md-4">
    				    <div class="form-group">
    				        <label>TRN - VAT Number</label>
						    <input type="text" class="form-control" placeholder="" name="invoice_to_trn_vat_number" value="{{ old('invoice_to_trn_vat_number') ?? '' }}">
					    </div>
    				</div>
                </div>

                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <table id="{{ $page['term'] }}_list" class="table table-v2">
                        <thead>
                            <tr>
                                <th style="width: 50%">Product/Services</th>
                                <th class="text-center" style="width: 10%">Quantity</th>
                                <th class="text-center" style="width: 15%">Rate</th>
                                <th class="text-center" style="width: 10%"></th>
                                <th class="text-center" style="width: 15%">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control product items" placeholder="" name="product[]" value="">
                                        {{-- <select class="form-select form-control" name="product[]" id="product">
                                            <option value="" selected disabled></option>
                                            <option value="1">Hand Sanitizer</option>
                                            <option value="2">Select 3</option>
                                            <option value="3">Select 4</option>
                                        </select> --}}
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control text-end quantity items" placeholder="" name="quantity[]" value="">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control text-end rate items" placeholder="" name="rate[]" value="">
                                    </div>
                                </td>
                                <td></td>
                                <td>
                                    <div class="form-group">
                                        <input type="text" class="form-control amount text-center border-0 cursor-default items" placeholder="" name="amount[]" value="" hidden1>
                                        <!-- <p class="amount_value text-center m-0">11075.00</p> -->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="btn btn-primary-app btn-add">Add Item</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row py-2 py-md-4 border-bottom border-top border-dark-subtle">
                    <div class="col-md-6">
                        <div class="form-group m-0">
    				        <label>Note</label>
						    <textarea class="form-control" placeholder="" name="note" rows="2">{{ old('note') }}</textarea>
					    </div>
                    </div>
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-4">
                        <div class="row py-1 align-items-center border-bottom border-dark-subtle">
                            <div class="col-md-8"><p class="m-0">Subtotal:</p></div>
                            <div class="col-md-4">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control subtotal text-end border-0 cursor-default" placeholder="" name="subtotal" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row py-1 align-items-center border-bottom border-dark-subtle">
                            <div class="col-md-8"><p class="m-0">Discount:</p></div>
                            <div class="col-md-4">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control discount text-end" placeholder="" name="discount" value="">
                                </div>
                            </div>
                        </div>
                        <div class="row py-1 align-items-center">
                            <div class="col-md-8"><p class="m-0">VAT(5%):</p></div>
                            <div class="col-md-4">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control vat text-end border-0 cursor-default" placeholder="" name="vat" value="">
                                </div>
                            </div>
                        </div>
    				</div>
                </div>

                <div class="row py-2">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <div class="row py-1 align-items-center">
                            <div class="col-md-8"><p class="m-0">Grandtotal:</p></div>
                            <div class="col-md-4">
                                <div class="form-group m-0">
                                    <input type="text" class="form-control total text-end border-0 cursor-default" placeholder="" name="total" value="">
                                </div>
                            </div>
                        </div>
    				</div>
                </div>
            </div>

            <div class="page-heading d-flex flex-column flex-md-row align-items-start align-items-md-center justify-content-between pt-2 pt-md-4 border-top1 border-light-subtle1">
                <div></div>
                <div class="buttons d-flex flex-wrap align-items-center justify-content-md-end">
                    @include('includes.utils.session-alert')
                    <input type="reset" value="Reset" class="btn btn-primary-app">
                    <input type="submit" value="Download" class="btn btn-primary-app">
                </div>
            </div>
        </form>

    </div>
</div>

@endsection

@section('customjs')
<script>
    $('.form-control-file input').on('change', function(e) {
        var el = $(this);
        var file = e.target.files[0];
        if (file && file.type.startsWith('image/')) {
            var reader = new FileReader();

            reader.onload = function(event) {
                console.log(event);
                el.parent().find('.file-preview').attr('src', event.target.result).show();
                localStorage.setItem('company_logo', event.target.result);
            };

            reader.readAsDataURL(file);
        } else {
            el.parent().find('.file-preview').hide();
        }
    });

    var storedLogo = localStorage.getItem('company_logo');
    if (storedLogo) {
        $('.file-preview').attr('src', storedLogo).show();
    }

    $(document).on('keyup', '.quantity, .rate', function () {
        var parent = $(this).closest('tr');
        var a = parseFloat(parent.find('.quantity').val()) || null;
        var b = parseFloat(parent.find('.rate').val()) || null;
        var qtyField = parent.find('.quantity');
        var rateField = parent.find('.rate');
        var amountField = parent.find('.amount');

        if(isNaN($(this).val())) $(this).val('');

        amountField.val(a !== null && b !== null ? (a * b).toFixed(2) : '');

        var subtotal = 0;
        $('.amount').each(function(){
            var amount = parseFloat($(this).val());
            if (!isNaN(amount)) subtotal += amount;
        });

        var vat = subtotal ? (subtotal * 5) / 100 : 0;
        $('.subtotal').val(subtotal ? subtotal.toFixed(2) : '');
        $('.discount').val(parseFloat($('.discount').val()) || '');
        $('.vat').val(vat ? vat.toFixed(2) : '');
        $('.total').val(subtotal ? (subtotal + vat).toFixed(2) : '');
    });

    $(document).on('keyup', '.discount', function () {
        //$('.total').val((parseFloat($('.subtotal').val()) - parseFloat($('.discount').val()) + parseFloat($('.vat').val())).toFixed(2));
        var subtotal = parseFloat($('.subtotal').val()) || 0;
        var discount = parseFloat($(this).val()) || 0;
        var vat = parseFloat($('.vat').val()) || 0;

        if (discount > subtotal) {
            $(this).val(subtotal.toFixed(2));
            discount = subtotal;
        }

        $('.total').val((subtotal - discount + vat).toFixed(2));
    });

    $(document).on('blur', '.discount', function () {
        $(this).val(parseFloat($(this).val()).toFixed(2));
    });

    $(document).on('click', '.btn-add', function () {
        var target = $(this).closest('tr').prev();
        var clone = target.clone();
        
        clone.find('input').val('');
        clone.insertAfter(target);
    });

    $(document).on('submit', '#add_{{ $page['term'] }}', function (e) {
        // e.preventDefault();

        // var formData = {};

        // $(this).serializeArray().forEach(function(item) {
        //     formData[item.name] = item.value;
        // });

        // localStorage.setItem('invoiceFormData', JSON.stringify(formData));

        // this.submit();


        e.preventDefault();

        var formData = {};
        var itemsData = {};

        $(this).serializeArray().forEach(function(item) {
            if ($('input[name="'+item.name+'"]').hasClass('items')) {
                if (!itemsData[item.name]) {
                    itemsData[item.name] = [];
                }
                itemsData[item.name].push(item.value);
            } else {
                formData[item.name] = item.value;
            }
        });

        formData['itemsData'] = itemsData;

        //console.log(itemsData);

        localStorage.setItem('invoiceFormData', JSON.stringify(formData));

        this.submit();
    });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script>
        $(document).ready(function () {
 
            $(function () {
                $(".date").
                datepicker();
            });
        }) 
    </script>
@endsection
