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
                      <label for="" class="col-sm-2 col-form-label">Title</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->title}}" class="form-control" name="title">
                      </div>
                  </div>
                  <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Price</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->price}}"  class="form-control" name="price">
                      </div>
                  </div>
                  <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Description</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->description}}"  class="form-control" name="description">
                      </div>
                  </div>
                  <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Category</label>
                      <div class="col-sm-3">
                        <select class="form-control" name="category">
                            <option selected value="{{$nani->category}}">{{$nani->category}}</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="8">8</option>
                        </select>
                      </div>
                  </div>
                    <div class="mt-5 row">
                      <label for="" class="col-sm-2 col-form-label">Stock</label>
                      <div class="col-sm-3">
                          <input type="text" value="{{$nani->stock}}"  class="form-control" name="stock">
                      </div>
                    </div>
              <div class="modal-footer">
                  <a href="{{ url('/admin/product') }}" class="btn btn-primary">Go Back</a>
                  <button class="modal-default-button btn btn-primary mx-2" type="submit">Save</button>
              </div>
          </form>
      </div>
      </div>
  </div>
</div>
@endsection
