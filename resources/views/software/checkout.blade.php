@extends('layout.app')
@section('extra-css')
	<link type="text/css" rel="stylesheet" href="{{asset('css/checkout.css')}}"/>
<script src="https://js.stripe.com/v3/"></script>

@endsection

@include('inc.header')
@include('inc.nav')
@section('content')


<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="breadcrumb-header">Checkout</h3>
        <ul class="breadcrumb-tree">
          <li><a href="#">Home</a></li>
          <li class="active">Checkout</li>
        </ul>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-7">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Billing address</h3>
          </div>
          <div class="form-group">
            <input class="input" type="text" name="first-name" placeholder="First Name">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="last-name" placeholder="Last Name">
          </div>
          <div class="form-group">
            <input class="input" type="email" name="email" placeholder="Email">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="address" placeholder="Address">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="city" placeholder="City">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="country" placeholder="Country">
          </div>
          <div class="form-group">
            <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
          </div>
          <div class="form-group">
            <input class="input" type="tel" name="tel" placeholder="Telephone">
          </div>
          <div class="form-group">
            <div class="input-checkbox">
              <input type="checkbox" id="create-account">
              <label for="create-account">
                <span></span>
                Create Account?
              </label>
              <div class="caption">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
                <input class="input" type="password" name="password" placeholder="Enter Your Password">
              </div>
            </div>
          </div>
        </div>
        <!-- /Billing Details -->

        <!-- Shiping Details -->
        <div class="shiping-details">
          <div class="section-title">
            <h3 class="title">Shiping address</h3>
          </div>
          <div class="input-checkbox">
            <input type="checkbox" id="shiping-address">
            <label for="shiping-address">
              <span></span>
              Ship to a diffrent address?
            </label>
            <div class="caption">
              <div class="form-group">
                <input class="input" type="text" name="first-name" placeholder="First Name">
              </div>
              <div class="form-group">
                <input class="input" type="text" name="last-name" placeholder="Last Name">
              </div>
              <div class="form-group">
                <input class="input" type="email" name="email" placeholder="Email">
              </div>
              <div class="form-group">
                <input class="input" type="text" name="address" placeholder="Address">
              </div>
              <div class="form-group">
                <input class="input" type="text" name="city" placeholder="City">
              </div>
              <div class="form-group">
                <input class="input" type="text" name="country" placeholder="Country">
              </div>
              <div class="form-group">
                <input class="input" type="text" name="zip-code" placeholder="ZIP Code">
              </div>
              <div class="form-group">
                <input class="input" type="tel" name="tel" placeholder="Telephone">
              </div>
            </div>
          </div>
        </div>
        <!-- /Shiping Details -->

        <!-- Order notes -->
        <div class="order-notes">
          <textarea class="input" placeholder="Order Notes"></textarea>
        </div>
        <!-- /Order notes -->
      </div>

      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Your Order</h3>
        </div>
        <div class="order-summary">

          <div class="order-col">
            <div><strong>PRODUCT</strong></div>
            <div><strong>TOTAL</strong></div>
          </div>
          <div class="order-products">
            @foreach(Cart::content() as $item)

            <div class="order-col">
              <div>{{$item->model->title}}</div>
              <div>${{$item->model->price}}</div>
            </div>
            @endforeach
          </div>
          <div class="order-col">
            <div>Shiping</div>
            <div><strong>FREE</strong></div>
          </div>
          <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">${{Cart::total()}}</strong></div>
          </div>
        </div>
        <div class="payment-method">
          <div class="input-radio">
            <input type="radio" name="payment" id="payment-1">
            <label for="payment-1">
              <span></span>
              Direct Bank Transfer
            </label>
            <div class="caption">
              <form action="/charge" method="post" id="payment-form">
    <div class="form-row">
      <div class="form-group">
      <label for="card-element">
        Credit or debit card
      </label>
      <div id="card-element">
        
      </div>

      <!-- Used to display form errors. -->
      <div id="card-errors" role="alert"></div>
    </div>
  </div>

    <button>Submit Payment</button>
  </form>
            </div>
          </div>
          <div class="input-radio">
            <input type="radio" name="payment" id="payment-2">
            <label for="payment-2">
              <span></span>
              Cheque Payment
            </label>
            <div class="caption">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
          <div class="input-radio">
            <input type="radio" name="payment" id="payment-3">
            <label for="payment-3">
              <span></span>
              Paypal System
            </label>
            <div class="caption">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
          </div>
        </div>
        <div class="input-checkbox">
          <input type="checkbox" id="terms">
          <label for="terms">
            <span></span>
            I've read and accept the <a href="#">terms & conditions</a>
          </label>
        </div>
        <a href="#" class="primary-btn order-submit">Place order</a>
      </div>
      <!-- /Order Details -->

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@section('extra-js')
<script>
(function(){
  // Create a Stripe client.
var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.addEventListener('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

})();
</script>

@endsection
@endsection
