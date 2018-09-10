@extends('layout.app')
@include('inc.header')
@include('inc.nav')
@section('content')


<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- ASIDE -->
      <div id="aside" class="col-md-3">
        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Categories</h3>
          <div class="checkbox-filter">
            <ul>
        @foreach($categories as $category)
            <li><a href="{{route('all.index',['category'=>$category->slug])}}">  {{$category->name}}</a></li>





        @endforeach
        </ul>

          </div>
        </div>
        <!-- /aside Widget -->



        <!-- aside Widget -->

        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Top Softwares</h3>
          <div class="product-widget">
            <div class="product-img">
              <img src="./img/product01.png" alt="">
            </div>
            <div class="product-body">
              <p class="product-category">Category</p>
              <h3 class="product-name"><a href="#">product name goes here</a></h3>
              <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
          </div>

          <div class="product-widget">
            <div class="product-img">
              <img src="./img/product02.png" alt="">
            </div>
            <div class="product-body">
              <p class="product-category">Category</p>
              <h3 class="product-name"><a href="#">product name goes here</a></h3>
              <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
          </div>

          <div class="product-widget">
            <div class="product-img">
              <img src="./img/product03.png" alt="">
            </div>
            <div class="product-body">
              <p class="product-category">Category</p>
              <h3 class="product-name"><a href="#">product name goes here</a></h3>
              <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->
      </div>
      <!-- /ASIDE -->

      <!-- STORE -->
      <div id="store" class="col-md-9">
        <!-- store top filter -->
        <div class="store-filter clearfix">
          <div class="store-sort">
            <label>
              Sort By:
              <select class="input-select">
                <option value="0">Popular</option>
                <option value="1">Position</option>
              </select>
            </label>

            <label>
              Show:
              <select class="input-select">
                <option value="0">20</option>
                <option value="1">50</option>
              </select>
            </label>
          </div>
          <ul class="store-grid">
            <li class="active"><i class="fa fa-th"></i></li>
            <li><a href="#"><i class="fa fa-th-list"></i></a></li>
          </ul>
        </div>
        <!-- /store top filter -->

        <!-- store products -->
        <div class="row">
          <!-- product -->

          @foreach($downloads as $download)
           @foreach($download->downloads as $d)
            <div class="col-md-4 col-xs-6">
              <div class="product-widget">

                  <div class="product-img">

                    <img src="{{$d->image}}" alt="">

                  </div>
                  <div class="product-body">
                    <p class="product-category">Category</p>
                    <h3 class="product-name"><a href="{{route('software.show',$d->slug)}}">{{$d->title}}</a></h3>
                    <h4 class="product-price">${{$d->price}} <del class="product-old-price">$990.00</del></h4>
                  </div>
                </div>



            </div>
           @endforeach
          <!-- /product -->
            @endforeach


        <!-- /store products -->


      </div>
      <!-- /STORE -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
