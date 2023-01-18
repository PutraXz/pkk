@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Users</h1>
        <p class="mb-4">For more information about DataTables and use It here, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Products Table<button type="button" class="mx-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">Add Product</button></h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name Product</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        </tfoot>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category}}</td>
                                <td><a href="{{route('product.edit',$product->id)}}">Edit</a> |
                                <form method="POST" action="{{ url('admin/product')}}/{{$product->id}}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn hapus" onclick="return confirm('Hapus Data?')" style="color: #d31c4a;font-size:16px">Delete</button>
                                </form> </td>
                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                    {{-- {{ $product->links() }} --}}
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                                <div class="alert alert-danger">{{ $error }}</div>
                            @endforeach
                        @endif
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Title</label>
                                <input type="text" name="title"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Price</label>
                                <input type="text" name="price"  class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Stock</label>
                                <input type="number" name="stock"  class="form-control" min="1" max="99">
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Description</label>
                                <textarea class="form-control" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Category</label>
                                <select class="form-control" name="category">
                                    <option selected disabled>Select Category</option>
                                    <option value="2">2</option>
                                    <option value="4">4</option>
                                    <option value="8">8</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="" class="col-sm-2 col-form-label">Image</label>
                                <input type="file" class="form-control" name="file">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
