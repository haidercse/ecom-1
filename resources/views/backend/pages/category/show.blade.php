@extends('backend.layouts.master')

@section('title')
    Show - categories
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Show Category</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($categories as $category)
                    <tr>
                        <th scope="row">#</th>
                        <td>{{$category->name}}</td>
                        <td>
                            @if ($category->parent_id == NULL)
                              Primary Category
                            @else
                              {{$category->parent->name}}
                            @endif
                        </td>
                        <td>
                            <img src="{{ asset('images/category/'.$category->image) }}" width="82" alt="{{ $category->name }}">
                        </td>
                        <td>
                            <a  href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-success">Edit</a>
                            <a  href="#delteModal{{ $category->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>


                            <!--Delete  Modal -->
                            <div class="modal fade" id="delteModal{{ $category->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
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
