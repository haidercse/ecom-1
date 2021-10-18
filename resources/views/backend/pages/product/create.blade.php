@extends('backend.layouts.master')

@section('title')
    Create - Product
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Add Product</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text"  name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description"  class="form-control" cols="80" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input type="number" name="price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Quantity</label>
                    <input type="number" name="quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                   <select name="category_id" class="form-control">
                       <option value="">Please, Select a Category for the product</option>
                       @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', NULL)->get() as $parent)
                         <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                            @foreach (App\Models\Category::orderBy('name','asc')->where('parent_id', $parent->id)->get() as $child)
                                <option value="{{ $child->id }}">----->{{ $child->name }}</option>
                            @endforeach
                       @endforeach
                   </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Brand</label>
                   <select name="brand_id" class="form-control">
                       <option value="">Please, Select a brand for the product</option>
                       @foreach (App\Models\Brand::orderBy('name','asc')->get() as $brand)
                         <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                       @endforeach
                   </select>
                </div>
                 <div class="form-group">
                    <label for="exampleInputEmail1">product Image</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-md-4">
                            <input type="file" class="form-control" name="image[]" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Add Product</button>
              </form>
          </div>
      </div>
  </div>
@endsection
