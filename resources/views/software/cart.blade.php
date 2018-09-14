@extends('layout.app')
@include('inc.header')
@include('inc.nav')

@section('content')


<div class="container-fluid">
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
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-1">

          @if(Cart::count()>0)
<h2>{{Cart::count()}} item(s) in the Shopping Cart</h2>



            <table class="table table-hover">

                <thead>
                    <tr>
                        <th>Software</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>
                  @foreach(Cart::content() as $item)

                    <tr>
                        <td class="col-sm-3 col-md-3">
                        <div class="media">

                            <a class="thumbnail pull-left" href="{{route('software.show',$item->model->slug)}}"> <img class="media-object" src="{{asset($item->model->image)}}" style="width: 72px; height: 72px;"> </a>
                            <div class="media-body">
                                <h4 class="media-heading"><a href="{{route('software.show',$item->model->slug)}}">{{$item->model->title}}</a></h4>
                                <h5 class="media-heading"> by <a href="#">Brand name</a></h5>

                            </div>
                        </div></td>
                        <td class="col-sm-1 col-md-1" style="text-align: center">
                        <input type="email" class="form-control" id="exampleInputEmail1" value="3">
                        </td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$item->model->price}}</strong></td>
                        <td class="col-sm-1 col-md-1 text-center"><strong>${{$item->model->price}}</strong></td>
                        <td class="col-sm-1 col-md-1">


                          <!-- <button type="button" class="btn btn-danger">
                              <span class="glyphicon glyphicon-remove"></span><a href="">
                               Remove</a>
                          </button> -->
                          <form action="{{route('cart.destroy', $item->rowId) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE')}}
                            <button type="submit" class="cart-options">Remove</button>

                          </form>

                        </td>
                    </tr>


                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>

                          <h5>Subtotal</h5></td>
                        <td class="text-right"><h5><strong>${{$item->subtotal()}}</strong></h5></td>
                    </tr>
  @endforeach
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong>${{Cart::total()}}</strong></h3></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>

                        <td>
                          <div class="cart-btns">

                            <a href="{{route('all.index')}}">Continue Shopping <i class="fa fa-arrow-circle-right"></i></a>
                          </div></td>
                        <td>
                          <div class="cart-btns">

                            <a href="{{route('checkout.index')}}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                          </div></td>
                    </tr>
                </tbody>
            </table>
            @else
            <h2>No Softwares in the Cart.</h2>
            <div class="cart-btns">

              <a href="{{route('all.index')}}">Continue Shopping <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          @endif
        </div>
    </div>
</div>


@include('inc.footer')


@endsection
