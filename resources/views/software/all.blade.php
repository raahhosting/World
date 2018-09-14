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
            @foreach($topSoft as $download)
          <div class="product-widget">

            <div class="product-img">
              <img src="{{ asset($download->image) }}" alt="">
            </div>
            <div class="product-body">
              <p class="product-category">Category</p>
              <h3 class="product-name"><a href="#">{{$download->title}}</a></h3>
              <h4 class="product-price">${{$download->price}} <del class="product-old-price">$990.00</del></h4>
            </div>

          </div>
            @endforeach




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



          </div>
          <!-- /product -->
            @endforeach


            </div>



        <!-- /store products -->


      </div>
      <!-- /STORE -->

  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->


@include('inc.footer')

@endsection
