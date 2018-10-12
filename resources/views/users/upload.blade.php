@extends('layout.app')

@include('inc.header')
@include('inc.nav')
@section('content')


<div class="container">

  <div class="row">
    <div class="col-md-7">
<form>
  <div class="form-group">
    <input class="input" type="text" id="title" name="title" placeholder="Title" value="" >
  </div>

  <div class="form-group">
    <label for="description">Description</label>
    <textarea placeholder="description" class="form-control" name="description" id="description">


    </textarea>

  </div>

  <div class="form-group">
    <label for="categoties">Categories</label>
    <select class="form-control" id="categories">
      @foreach($categories as $category)
      <option>{{$category->name}}</option>
      @endforeach

    </select>
  </div>


  <div class="form-group">
    <label for="image">Image</label>
    <input type="file" class="form-control-file" id="image" name="image">
  </div>
</form>

<div class="form-group">
  <label for="image">Software</label>
  <input type="file" class="form-control-file" id="software" name="software">
</div>
</form>

</div>
</div>

</div>


@endsection
