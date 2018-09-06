<!-- aside Widget -->
  <div id="aside" class="col-md-3">
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
</div>
<!-- /aside Widget -->
