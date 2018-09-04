@extends('layout.app')
@include('inc.header')
@include('inc.nav')
@section('content')

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-12">
        <ul class="breadcrumb-tree">
          <li><a href="#">Home</a></li>
          <li><a href="#">All Categories</a></li>
          <li><a href="#">Security</a></li>

          <li class="active">{{$download->title}}</li>
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

  <div id="program-header" class="clearfix">
<div class="program-title-container">
<div id="program-header-left-col">

  <div class="product-img">

    <img src="{{ asset('img/'. $download->image) }}" alt="">

  </div><h1 class="title-text" title="Avast Antivirus 18.6.2349">
    <span itemprop="name">{{$download->title}}</span>
    <span style="font-weight: normal">18.6.2349</span>
</h1>


<div id="publisher-licence-details">
<span class="program-header-author">
By
<a href="http://www.avast.com" target="_blank" class="external-link"
title="Avast Software">
Avast Software</a>

</span>

  <!-- container -->
<div class="row">
  <div class="col-md-6">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
    <li role="presentation"><a href="#technical" aria-controls="profile" role="tab" data-toggle="tab">Technical</a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
    <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="description">{{$download->description}}</div>
    <div role="tabpanel" class="tab-pane" id="technical">...</div>
    <div role="tabpanel" class="tab-pane" id="messages">...</div>
    <div role="tabpanel" class="tab-pane" id="settings">...</div>
  </div>

</div>


<div class="col-md-6">


  <div class="col-md-5">
    <div class="product-details">
      <h2 class="product-name">{{$download->title}}</h2>
      <div>
        <div class="product-rating">
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star"></i>
          <i class="fa fa-star-o"></i>
        </div>
        <a class="review-link" href="#">10 Review(s) | Add your review</a>
      </div>
      <div>
        <h3 class="product-price">${{$download->price}}</h3>
        <span class="product-available">In Stock</span>
      </div>




      <div class="add-to-cart">

        <!-- <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button> -->

        <form action="{{route('cart.store')}}" method="post">
          {{csrf_field() }}
         <input type="hidden" name="id" value="{{$download->id}}" />
          <input type="hidden" name="title" value="{{$download->title}}" />
           <input type="hidden" name="price" value="{{$download->price}}" />
           <input type="hidden" name="price" value="{{$download->image}}" />
          <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
        </form>
      </div>




      <ul class="product-links">
        <li>Share:</li>
        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        <li><a href="#"><i class="fa fa-envelope"></i></a></li>
      </ul>

    </div>
  </div>
  <!-- /Product details -->

</div>








</div>
<!-- /SECTION -->
@endsection
