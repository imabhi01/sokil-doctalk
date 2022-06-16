@extends('layouts.master')
@push('styles')
<style>
    span.text-primary {
        color: #000 !important;
    }
</style>
@endpush
@section('content')
    <div class="container">
        <div class="text-center">
            <h2>CHECKOUT FORM</h2>

            @if (\Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! \Session::get('success') !!}</strong> 
                </div>
            @endif

            @if (\Session::has('failure'))
                <div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{!! \Session::get('failure') !!}</strong> 
                </div>
            @endif

        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">ORDER TOTAL</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                    <h6 class="my-0">Sub Total</h6>
                </div>
                <span class="text-muted">Rs. 100</span>
                </li>
                <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                    <h6 class="my-0">Promo code</h6>
                </div>
                <span class="text-success">- Rs. 50</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                <span>Total (RS)</span>
                <strong>RS. 50</strong>
                </li>
            </ul>
            </div>
            <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">Billing address</h4>
            <form 
                class="require-validation" 
                method="POST" 
                action="{{ route('place.order') }}"
                data-cc-on-file="false"
                data-stripe-publishable-key="{{ config('services.stripe.key')}}" 
                id="payment-form"
            >
                @csrf
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <div class="row g-3">
                <div class="col-sm-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" value="{{ auth()->user()->name }}" placeholder="Name" required>
                </div>

                <div class="col-sm-6">
                    <label for="email" class="form-label">Email <span class="text-muted"></span></label>
                    <input type="email" class="form-control" value="{{ auth()->user()->email }}" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                    </div>
                </div>

                <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" value="TEST" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                    Please enter your shipping address.
                    </div>
                </div>

                <h4 class="mb-3">Payment</h4>

                <!-- <div class="my-3">
                <div class="form-check">
                    <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked required>
                    <label class="form-check-label" for="credit">Credit card</label>
                </div>
                <div class="form-check">
                    <input id="debit" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="debit">Debit card</label>
                </div>
                <div class="form-check">
                    <input id="paypal" name="paymentMethod" type="radio" class="form-check-input" required>
                    <label class="form-check-label" for="paypal">PayPal</label>
                </div>
                </div> -->

                <!-- <div class="row gy-3"> -->
                <div class="col-md-6">
                    <label for="cc-name" class="form-label">Name on card</label>
                    <input type="text" class="form-control" id="cc-name" value="TEST" placeholder="Name on Card" required>
                    <small class="text-muted">Full name as displayed on card</small>
                    <div class="invalid-feedback">
                    Name on card is required
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="cc-number" class="form-label">Credit card number</label>
                    <input type="text" class="form-control card-number" value="4242424242424242" id="cc-number" placeholder="Card Number" required>
                    <div class="invalid-feedback">
                    Credit card number is required
                    </div>
                </div>

                <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">Expiration</label>
                    <input type="text" class="form-control card-expiry-month" value="12" id="cc-cvv" placeholder="MM" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">Year</label>
                    <input type="text" class="form-control card-expiry-year"  value="2025" id="cc-cvv" placeholder="YYYY" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="cc-cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control card-cvc" id="cc-cvv" value="123" placeholder="CVC" required>
                    <div class="invalid-feedback">
                        Security code required
                    </div>
                </div>
                </div>

                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit">Place Order</button>
            </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script>
    var $form = $(".require-validation");
    
    $('form.require-validation').bind('submit', function(e) {
        var $form     = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
  
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
        });
    
        if (!$form.data('cc-on-file')) {
            e.preventDefault();
            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }
  
    });
  
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
</script>
@endpush