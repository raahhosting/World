@extends('layout.app')

@include('inc.header')
@include('inc.nav')
@section('content')



<div id="aside" class="col-md-2" style="  background-color: #15161D; height:1000px;">
<div class="aside">
  <h3 class="aside-title" style=" color:white;">Dashboard</h3>

    <ul>


<li><a href="">Upload Your Software</a></li>
<li>View Downloads</li>


</ul>
</div>
</div>

<div class="col-md-10">

  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Upload Software</button>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Software</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="title" class="col-form-label">Name</label>
              <input type="text" class="form-control" id="title">
            </div>
            <div class="form-group">
              <label for="description" class="col-form-label">Description</label>
              <textarea class="form-control" id="description"></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Upload Software</button>
        </div>
      </div>
    </div>
  </div>

</div>






@endsection
