@extends('backend.layouts.master')

@section('title')
    Show - Product
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Show Product</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($products as $product)
                    <tr>
                        <th scope="row">#</th>
                        <td>#ECOMP{{$product->id}}</td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>
                            <a  href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-success">Edit</a>
                            <a  href="#delteModal{{ $product->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>


                            <!--Delete  Modal -->
                            <div class="modal fade" id="delteModal{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.product.destroy',$product->id) }}" method="POST">
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
