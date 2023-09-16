@extends('layouts.app')

@section('content')
<div class="modal-mask">
  <div class="modal-wrapper">
      <div class="modal-container">
          <div class="modal-header">
            <h3 class="m-0 font-weight-bold text-primary">Edit Product</h3>
          </div>
          <div class="modal-body">
              <form action="" method="post" enctype="multipart/form-data">
                @csrf
                  <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Name Theme</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->name_theme}}" class="form-control" name="name_theme">
                      </div>
                  </div>
                  <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Price</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->price}}"  class="form-control" name="price">
                      </div>
                  </div>
              <div class="modal-footer">
                  <a href="{{ url('dashboard/admin/themes') }}" class="btn btn-primary">Go Back</a>
                  <button class="modal-default-button btn btn-primary mx-2" type="submit">Save</button>
              </div>
          </form>
      </div>
      </div>
  </div>
</div>
@endsection
