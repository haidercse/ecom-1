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
            <form method="POST" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider Title <small class="text-danger">(Required)</small> </label>
                  <input type="text"  name="title" class="form-control" id="exampleInputEmail1" placeholder="Slider Title">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slider Image <small class="text-danger">(Required)</small> </label>
                    <input type="file"  name="image" class="form-control" id="exampleInputEmail1" placeholder="Slider Image">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slider Button Text <small class="text-info">(Optional)</small> </label>
                    <input type="file"  name="image" class="form-control" id="exampleInputEmail1" placeholder="Slider Button text (if need)">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Slider Button Link <small class="text-info">(Optional)</small> </label>
                    <input type="file"  name="image" class="form-control" id="exampleInputEmail1" placeholder="Slider Button Link (if need)">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Slider Priority <small class="text-info">(Required)</small></label>
                    <input type="number"  name="priority" class="form-control" id="exampleInputEmail1" placeholder="Slider Priority e.g.10" value="10" required>
                  </div>

                <button type="submit" class="btn btn-primary">Add New</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
              </form>
          </div>
      </div>
  </div>
@endsection
