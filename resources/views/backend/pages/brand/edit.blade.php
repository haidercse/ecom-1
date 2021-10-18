@extends('backend.layouts.master')

@section('title')
    Update - Categories
@endsection

@section('admin-content')
  <div class="container">
  
      <div class="card">
          <div class="card-header">
             <h3>Update brand</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')
            <form method="POST" action="{{ route('admin.brand.update',$brand->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{ $brand->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description"  class="form-control" cols="80" rows="10">{{ $brand->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">brand Old  Image</label><br>
                    <img src="{{ asset('images/brand/'.$brand->image) }}" width="82" alt="{{ $brand->name }}"><br>


                    <label for="exampleInputEmail1">brand New  Image(optional)</label>
                    <input type="file" class="form-control" name="image" id="exampleInputEmail1" >
                </div>
                <button type="submit" class="btn btn-success">Update brand</button>
              </form>
          </div>
      </div>
  </div>
@endsection
