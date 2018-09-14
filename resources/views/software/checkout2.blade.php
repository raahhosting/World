@extends('layout.app')
@section('extra-css')
	<link type="text/css" rel="stylesheet" href="{{asset('css/checkout.css')}}"/>


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


<!--Start checkout  Section  -->

<div class="section">
<!-- container -->

  <div class="container">

    @if(session()->has('success_message'))
    <div class="spacer"></div>
    <div class="alert alert-success">
      {{session()->get('success_message')}}

    </div>
    @endif
		@if(count($errors)>0)

		<div class="spacer"></div>
		<div class="alert alert-danger">
     <ul>
@foreach($errors->all() as $error)

<li>{!! $error!!}</li>

@endforeach

		 </ul>

		</div>

		@endif

    <!-- row -->

    <div class="row">
<!--begin column  -->
<div class="col-md-7">

  <!-- billing details -->
  <div class="billing-details">

    <div class="section-title">
      <h3 class="title">Billing address</h3>
    </div>
    <form action="{{route('checkout.store')}}" method="post" id="payment-form">
  <!-- Billing Details -->
  {{csrf_field()}}

  <div class="form-group">
    <input class="input" type="text" id="name" name="name" placeholder="Name" value="{{auth()->user()->name}}" readonly>
  </div>

  <div class="form-group">
    <input class="input" type="text" id="username" name="username" placeholder="User Name" value="{{auth()->user()->username}}" required>
  </div>
  <div class="form-group">
    <input class="input" type="email" id="email" name="email" placeholder="Email" value="{{auth()->user()->email}}" readonly>
  </div>
  <div class="form-group">
    <input class="input" type="text" id="address"  name="address" placeholder="Address" value="{{old('address')}}" required>
  </div>
  <div class="form-group">
    <input class="input" type="text" id="city" name="city" placeholder="City" value="{{old('city')}}" required>
  </div>
  <div class="form-group">
    <input class="input" type="text" id="country" name="country" placeholder="Country" value="{{old('country')}}" required>
  </div>
  <div class="form-group">
    <input class="input" type="text" id="zip-code" name="zip-code" placeholder="ZIP Code" value="{{old('zip-code')}}">
  </div>
  <div class="form-group">
    <input class="input" type="tel" id="tel" name="tel" placeholder="Telephone" value="{{old('tel')}}">
  </div>

  <!-- payment details -->
  <div class="shiping-details">

    <div class="section-title">
      <h3 class="title">Payment Details</h3>
    </div>

    <div class="input-checkbox">
      <input type="checkbox" id="shiping-address">
      <label for="shiping-address">
        <span></span>
      Continue to Payment?
      </label>
      <div class="caption">

        <div class="form-group">
          <input class="input" type="text" id="name_on_card" name="name_on_card" placeholder="Name on Card" value="">
        </div>

        <div class="form-group">
          <input class="input" type="text" id="address" name="address" placeholder="Address" value="">
        </div>
        <!--stripe payment  -->
        <div class="form-row">
  <label for="card-element">
Credit or debit card
</label>
<div id="card-element">
<!-- A Stripe Element will be inserted here. -->
</div>

<!-- Used to display form errors. -->
<div id="card-errors" role="alert"></div>
</div>
<br>
<button class="primary-btn order-submit" type="submit" id="complete-order">Submit Payment</button>

        <!-- end stripe payment -->
      </div>
    </div>
  </div>
  <!--end payment details  -->
</form>


  </div>
  <!-- end billing details -->

</div>
<!--end column  -->


<!--begin second column  -->
<div class="col-md-5">
  <div class="section-title text-center">
    <h3 class="title">Your Order</h3>
  </div>

  <!-- order summary -->
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
<!--begin coupon  -->
    <div class="order-col">
      @if(session()->has('coupon'))
      <div>Discount({{session()->get('coupon')['name']}})
     <form action="{{route('coupon.destroy')}}" method="post" style="display:inline;">
       {{csrf_field()}}
  {{method_field('delete')}}
<button type="submit" style"font-size:14px;">Remove</button>

     </form>

      </div>
      <div><strong>{{$discount}}</strong></div>
      @endif
      </div>
      <!--end coupon -->
      <div class="order-col">
        <div><strong>TOTAL</strong></div>
        <div><strong class="order-total">${{$newTotal}}</strong></div>

      </div>

      @if(!session()->has('coupon'))
    <a href="#" class="have-code">Have a code?</a>
    <div>
  <form action ="{{route('coupon.store')}}" method="post">
    {{csrf_field()}}
     <input type="text" name="coupon_code" id="coupon_code">
<button type="submit" class="button button-plain">Apply</button>
  </form>

    </div>
    @endif
    <div class="input-checkbox">
      <input type="checkbox" id="terms">
      <label for="terms">
        <span></span>
        I've read and accept the <a href="#">terms & conditions</a>
      </label>
    </div>

  </div>



  <!-- end order summary -->

</div>

<!-- end second column -->

    </div>
<!--  end row-->
  </div>

  <!-- end container -->
</div>


@include('inc.footer')

<!-- end Section -->
@endsection

@section('extra-js')
<script>
(function(){
  // Create a Stripe client.
var stripe = Stripe('pk_test_vxCCeFxmMQkepzCUjCVh7igR');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    lineHeight: '18px',
    fontFamily: '"Roboto","Helvetica Neue", Helvetica, sans-serif',
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
var card = elements.create('card', {
	style: style,
	hidePostalCode:true
});

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

	//Disable the submit button to prevent repeated clicks
	document.getElementById('complete-order').disabled = true;

	var options = {
		name: document.getElementById('name_on_card').value,

		address_line1: document.getElementById('address').value,
		address_city: document.getElementById('city').value,
		 address_state: document.getElementById('country').value,
		address_zip: document.getElementById('zip-code').value,
	}

  stripe.createToken(card,options).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;

			//enable submit button Here
				document.getElementById('complete-order').disabled = false;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}

})();
</script>

@endsection
