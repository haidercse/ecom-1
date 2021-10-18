@extends('backend.layouts.master')

@section('title')
    Show - brands
@endsection

@section('admin-content')
  <div class="container">

      <div class="card">
          <div class="card-header">
             <h3>Show brand</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">brand Name</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($brands as $brand)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{$brand->name}}</td>
 
                        <td>
                            <img src="{{ asset('images/brand/'.$brand->image) }}" width="82" alt="{{ $brand->name }}">
                        </td>
                        <td>
                            <a  href="{{ route('admin.brand.edit',$brand->id) }}" class="btn btn-success">Edit</a>
                            <a  href="#delteModal{{ $brand->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>


                            <!--Delete  Modal -->
                            <div class="modal fade" id="delteModal{{ $brand->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.brand.destroy',$brand->id) }}" method="POST">
                                        @csrf
                                         <button type="submit" class="btn btn-danger">Permanent Delete</button>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                    </div>
                                </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
      </div>
  </div>
@endsection
