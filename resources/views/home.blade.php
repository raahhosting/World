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


<div class="program-entry">
<div class="program-entry-header">
<a href="https://filehippo.com/download_avast_antivirus/" class="internal-link">
<img src="https://images.filehippo.net/img/ex/8996__avast_icon_13_2_2017_converted.png" /><h2> Avast Free Antivirus 18.6.2349</h2></a></div>
<div class="program-entry-download-button category-page-box-fix">
<a href="https://filehippo.com/download_avast_antivirus/" class="green program-entry-download-link button-link">
<span class="sprite download-icon-white"></span>Download</a>
</div>
<div class="program-entry-details">Avast Software - 7.09MB (Non-Commercial Freeware)</div>
<div class="program-entry-description">
Avast Free Antivirus is an efficient and comprehensive antivirus program. It is one of the most popular antivirus programs available, thanks to the re...</div>
<div class="child-programs">

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













@include('inc.footer')


@endsection
