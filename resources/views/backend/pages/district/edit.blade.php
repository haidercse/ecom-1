@extends('backend.layouts.master')

@section('title')
    Update - District
@endsection

@section('admin-content')
  <div class="container">

      <div class="card">
          <div class="card-header">
             <h3>Update district</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')
            <form method="POST" action="{{ route('admin.district.update',$district->id) }}">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">Name</label>
                  <input type="text"  name="name" class="form-control" id="exampleInputEmail1" value="{{ $district->name }}">
                </div>
                <div class="form-group">
                    <label for="division_id">Select a division for this district</label>
                    <select name="division_id" class="form-control">
                        <option value="">Please, Select a division id for this district</option>
                        @foreach ($divisions as $division)
                          <option value="{{ $division->id }}" {{ $district->division->id == $division->id ? 'selected': ''}}>{{ $division->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Update district</button>
              </form>
          </div>
      </div>
  </div>
@endsection
