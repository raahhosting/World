<!-- HEADER -->
<header>
  <!-- TOP HEADER -->
  <div id="top-header">
    <div class="container">
      <ul class="header-links pull-left">
        <li><a href="#"><i class="fa fa-phone"></i>0244264363</a></li>
        <li><a href="#"><i class="fa fa-envelope-o"></i>https://twitter.com/raahhosting</a></li>
        <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Osu-Accra</a></li>
      </ul>
      <ul class="header-links pull-right">
        <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
        <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
      </ul>
    </div>
  </div>
  <!-- /TOP HEADER -->

  <!-- MAIN HEADER -->
  <div id="header">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- LOGO -->
        <div class="col-md-3">
          <div class="header-logo">
            <a href="/" class="logo">
              <h2><span style="color:white;">World</span><span style="color:#D10024;">Softwares</span></h2>
            </a>
          </div>
        </div>
        <!-- /LOGO -->

        <!-- SEARCH BAR -->
        <div class="col-md-6">
          <div class="header-search">
            <form action="{{route('search')}}" method="get" class="search-form">
              <select class="input-select">
                <option value="0">All Categories</option>
                <option value="1">File Sharing</option>
                <option value="1">Networking</option>
                  <option value="1">Drivers</option>
                    <option value="1">Security</option>
              </select>
              <input class="input" name="query" value="{{request()->input('query')}}" id="query" placeholder="Search here">
              <button class="search-btn">Search</button>
            </form>
          </div>
        </div>
        <!-- /SEARCH BAR -->

        <!-- ACCOUNT -->
        <div class="col-md-3 clearfix">
          <div class="header-ctn">
            <!-- Wishlist -->
            <div>
              <a href="#">
                <i class="fa fa-heart-o"></i>
                <span>Your Wishlist</span>
                <div class="qty">2</div>
              </a>
            </div>
            <!-- /Wishlist -->

            <!-- Cart -->
            <div class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <i class="fa fa-shopping-cart"></i>
                  @if(Cart::count()>0)
                <span>Your Cart</span>
                <div class="qty">{{Cart::instance('default')->count()}}</div>
              </a>
              <div class="cart-dropdown">

                <div class="cart-list">
                    @foreach(Cart::content() as $item)
                  <div class="product-widget">
                    <div class="product-img">
                      <img src="{{asset('./img/'.$item->model->image.'png')}}" alt="">
                    </div>
                    <div class="product-body">
                      <h3 class="product-name"><a href="{{route('software.show',$item->model->slug)}}">{{$item->model->title}}</a></h3>
                      <h4 class="product-price"><span class="qty">1x</span>${{$item->model->price}}</h4>
                    </div>
                    <button class="delete"><i class="fa fa-close"></i></button>
                  </div>
  @endforeach

                <div class="cart-summary">

             <small>{{Cart::count()}} item(s) in the Shopping Cart</small>


                  <h5>SUBTOTAL: ${{Cart::total()}}</h5>
                </div>
                <div class="cart-btns">
                  <a href="{{route('cart.index')}}">View Cart</a>
                  <a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>
            </div>

            <!-- /Cart -->


            @endif

            <!-- Menu Toogle -->
            <div class="menu-toggle">
              <a href="#">
                <i class="fa fa-bars"></i>
                <span>Menu</span>
              </a>
            </div>
            <!-- /Menu Toogle -->
          </div>
        </div>
        <!-- /ACCOUNT -->
      </div>
      <!-- row -->
    </div>
    <!-- container -->
  </div>
  <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
