@extends('backend.layouts.master')

@section('title')
    Create - Categories
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Add Category</h3>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea name="description"  class="form-control" cols="80" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Parent Category</label>
                    <select name="parent_id" id="" class="form-control">
                        <option value="">Please, Select a Parent Category(Optional)</option>
                        @foreach ($main_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Category New  Image</label>
                    <input type="file" class="form-control" name="image" id="exampleInputEmail1" >
                </div>
                <button type="submit" class="btn btn-primary">Add Category</button>
              </form>
          </div>
      </div>
  </div>
@endsection
