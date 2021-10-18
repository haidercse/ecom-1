@extends('backend.layouts.master')

@section('title')
    Update - Categories
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Update Category</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description"  class="form-control" cols="80" rows="10">{{ $category->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Parent Category</label>
                    <select name="parent_id" id="" class="form-control">
                        <option value="">Please, Select a Primary Category(Optional)</option>
                        @foreach ($main_categories as $cat)
                            <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected': ''}}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Old  Image</label><br>
                    <img src="{{ asset('images/category/'.$category->image) }}" width="82" alt="{{ $category->name }}"><br>


                    <label for="exampleInputEmail1">Category New  Image(optional)</label>
                    <input type="file" class="form-control" name="image" id="exampleInputEmail1" >
                </div>
                <button type="submit" class="btn btn-success">Update Category</button>
              </form>
          </div>
      </div>
  </div>
@endsection
