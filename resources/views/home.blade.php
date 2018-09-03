@extends('layout.app')
@include('inc.header')
@include('inc.nav')
@section('content')

<div class="jumbotron">
<div class="grey-top height-fix">
        <div class="left-bg"></div>
        <div class="bg">
            <div class="container main-splash">
                <div>
                    <div class="splash-text">
                        <div class="splash-content">
                            <h1>The Latest Versions<br />of the Best Software</h1>
                            <ul>
                                <li>Hand picked software titles - only the best!</li>
                                <li>Tested for malware, adware and viruses</li>

                            </ul>
                        </div>

                        <div class="btn btn-danger"><a href="#"><span  style="color:white;">BROWSE SOFTWARE</span></a></div>
                        <div class="btn btn-primary"><a href="#"><span style="color:white;">Latest updates</span></a></div>

                    </div>

                </div>
            </div>
        </div>
        <div class="right-bg"></div>
    </div>
  </div>

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">New Softwares</h3>
          <div class="section-nav">
            <ul class="section-tab-nav tab-nav">
              <li class="active"><a data-toggle="tab" href="#tab1">Business</a></li>
              <li><a data-toggle="tab" href="#tab1">Messaging</a></li>
              <li><a data-toggle="tab" href="#tab1">System Tuning</a></li>
              <li><a data-toggle="tab" href="#tab1">File Sharing</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /section title -->
</div>

      @foreach($downloads as $download)
      <!-- product widget -->
      <div class="product-widget">
        <div class="product-img">

          <img src="{{$download->image}}" alt="">

        </div>
        <div class="product-body">
          <p class="product-category">Category</p>
          <h3 class="product-name"><a href="{{route('software.show',$download->slug)}}">{{$download->title}}</a></h3>
          <h4 class="product-price">${{$download->price}} <del class="product-old-price">$990.00</del></h4>
        </div>
      </div>
      <!-- /product widget -->
      <!-- Products tab & slick -->

                @endforeach













<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <!-- section title -->
      <div class="col-md-12">
        <div class="section-title">
          <h3 class="title">Top selling</h3>
          <div class="section-nav">
            <ul class="section-tab-nav tab-nav">
              <li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
              <li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
              <li><a data-toggle="tab" href="#tab2">Cameras</a></li>
              <li><a data-toggle="tab" href="#tab2">Accessories</a></li>
            </ul>
          </div>
        </div>
      </div>
      <!-- /section title -->

  <!-- /SECTION -->

<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <div class="col-md-4 col-xs-6">
        <div class="section-title">
          <h4 class="title">Top selling</h4>
          <div class="section-nav">
            <div id="slick-nav-3" class="products-slick-nav"></div>
          </div>
        </div>

        <div class="products-widget-slick" data-nav="#slick-nav-3">
          <div>
            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product07.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product08.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product09.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- product widget -->
          </div>

          <div>
            <!-- product widget -->
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
            <!-- /product widget -->

            <!-- product widget -->
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
            <!-- /product widget -->

            <!-- product widget -->
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
            <!-- product widget -->
          </div>
        </div>
      </div>

      <div class="col-md-4 col-xs-6">
        <div class="section-title">
          <h4 class="title">Top selling</h4>
          <div class="section-nav">
            <div id="slick-nav-4" class="products-slick-nav"></div>
          </div>
        </div>

        <div class="products-widget-slick" data-nav="#slick-nav-4">
          <div>
            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product04.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product05.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product06.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- product widget -->
          </div>

          <div>
            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product07.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product08.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product09.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- product widget -->
          </div>
        </div>
      </div>

      <div class="clearfix visible-sm visible-xs"></div>

      <div class="col-md-4 col-xs-6">
        <div class="section-title">
          <h4 class="title">Top selling</h4>
          <div class="section-nav">
            <div id="slick-nav-5" class="products-slick-nav"></div>
          </div>
        </div>

        <div class="products-widget-slick" data-nav="#slick-nav-5">
          <div>
            <!-- product widget -->
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
            <!-- /product widget -->

            <!-- product widget -->
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
            <!-- /product widget -->

            <!-- product widget -->
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
            <!-- product widget -->
          </div>

          <div>
            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product04.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product05.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- /product widget -->

            <!-- product widget -->
            <div class="product-widget">
              <div class="product-img">
                <img src="./img/product06.png" alt="">
              </div>
              <div class="product-body">
                <p class="product-category">Category</p>
                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
              </div>
            </div>
            <!-- product widget -->
          </div>
        </div>
      </div>

    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
@include('inc.footer')


@endsection
