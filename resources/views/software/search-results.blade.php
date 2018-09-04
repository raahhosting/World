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

          <li class="active">Search</li>
        </ul>
      </div>
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /BREADCRUMB -->
<div class="container">
  @if(session()->has('success_message'))
  <div class="alert alert-success">

{{session()->get('success_message')}}

  </div>
  @endif


  @if(count($errors) >0)

<div class="alert alert-danger">

<ul>
@foreach($errors->all() as $error)

<li>{{$error}}</li>

@endforeach

</ul>
</div>
  @endif


</div>
<!-- SECTION -->
<div class="section">

<h1>Search Results</h1>

<p> {{$downloads->count()}} result(s) for '{{request()->input('query')}}'</p>


@foreach($downloads as $download)

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

@endforeach







</div>
<!-- /SECTION -->
@endsection
