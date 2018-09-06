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

            <div class="input-checkbox">
              <input type="checkbox" id="category-1">
              <label for="category-1">
                <span></span>
                All
                <small>(120)</small>
              </label>
            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="category-2">
              <label for="category-2">
                <span></span>
                File Sharing
                <small>(740)</small>
              </label>
            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="category-3">
              <label for="category-3">
                <span></span>
                Security
                <small>(1450)</small>
              </label>
            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="category-4">
              <label for="category-4">
                <span></span>
                Business Soft
                <small>(578)</small>
              </label>
            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="category-5">
              <label for="category-5">
                <span></span>
                  Drivers
                <small>(120)</small>
              </label>
            </div>

            <div class="input-checkbox">
              <input type="checkbox" id="category-6">
              <label for="category-6">
                <span></span>
                  Networking
                <small>(740)</small>
              </label>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->



        <!-- aside Widget -->
        <div class="aside">
          <h3 class="aside-title">Brand</h3>
          <div class="checkbox-filter">
            <div class="input-checkbox">
              <input type="checkbox" id="brand-1">
              <label for="brand-1">
                <span></span>
                SAMSUNG
                <small>(578)</small>
              </label>
            </div>
            <div class="input-checkbox">
              <input type="checkbox" id="brand-2">
              <label for="brand-2">
                <span></span>
                LG
                <small>(125)</small>
              </label>
            </div>
            <div class="input-checkbox">
              <input type="checkbox" id="brand-3">
              <label for="brand-3">
                <span></span>
                SONY
                <small>(755)</small>
              </label>
            </div>
            <div class="input-checkbox">
              <input type="checkbox" id="brand-4">
              <label for="brand-4">
                <span></span>
                SAMSUNG
                <small>(578)</small>
              </label>
            </div>
            <div class="input-checkbox">
              <input type="checkbox" id="brand-5">
              <label for="brand-5">
                <span></span>
                LG
                <small>(125)</small>
              </label>
            </div>
            <div class="input-checkbox">
              <input type="checkbox" id="brand-6">
              <label for="brand-6">
                <span></span>
                SONY
                <small>(755)</small>
              </label>
            </div>
          </div>
        </div>
        <!-- /aside Widget -->

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
          <div class="col-md-4 col-xs-6">
            <div class="product">

                <div class="product-img">

                  <img src="{{$download->image}}" alt="">

                </div>
                <div class="product-body">
                  <p class="product-category">Category</p>
                  <h3 class="product-name"><a href="{{route('software.show',$download->slug)}}">{{$download->title}}</a></h3>
                  <h4 class="product-price">${{$download->price}} <del class="product-old-price">$990.00</del></h4>
                </div>
              </div>



          </div>
          <!-- /product -->

          @endforeach
        <!-- /store products -->

        <!-- store bottom filter -->
        <div class="store-filter clearfix">
          <span class="store-qty">Showing 20-100 products</span>
          <ul class="store-pagination">
            <li class="active">1</li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
          </ul>
        </div>
        <!-- /store bottom filter -->
      </div>
      <!-- /STORE -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->

@endsection
