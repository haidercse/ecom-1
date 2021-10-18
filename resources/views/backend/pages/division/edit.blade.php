@extends('backend.layouts.master')

@section('title')
    Update - Categories
@endsection

@section('admin-content')
  <div class="container">

      <div class="card">
          <div class="card-header">
             <h3>Update division</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')
            <form method="POST" action="{{ route('admin.division.update',$division->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{ $division->name }}">
                </div>
                <div class="form-group">
                    <label for="priority">Priority(Optional)</label>
                    <textarea name="priority" class="form-control" cols="20" rows="2">{{$division->priority}}</textarea>
                </div>


                <button type="submit" class="btn btn-success">Update Division</button>
              </form>
          </div>
      </div>
  </div>
@endsection
