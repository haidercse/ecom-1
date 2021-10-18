@extends('backend.layouts.master')

@section('title')
    Create - Brands
@endsection

@section('admin-content')
  <div class="container">

      <div class="card">
          <div class="card-header">
             <h3>Add Division</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')
            <form method="POST" action="{{ route('admin.division.store') }}" >
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="priority">Priority</label>
                    <textarea name="priority" class="form-control" cols="20" rows="2"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Add division</button>
              </form>
          </div>
      </div>
  </div>
@endsection
