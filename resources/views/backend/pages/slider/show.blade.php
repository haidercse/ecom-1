@extends('backend.layouts.master')

@section('title')
    Show - sliders
@endsection

@section('admin-content')
  <div class="container">

      <div class="card">
          <div class="card-header">
             <h3>Show slider</h3>
          </div>
          <div class="card-body">
            @include('backend.layouts.partials.message')

            <a  href="#addSliderModal" data-toggle="modal" class="btn btn-info float-right mb-3"><i class="fas fa-plus mr-1"></i>Add new Slider</a>

            <div class="clearfix"></div>

             {{-- Add New Slider MOdal  --}}
             <div class="modal fade" id="addSliderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD NEW SLIDER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                       <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
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
                              <input type="text"  name="button_text" class="form-control" id="exampleInputEmail1" placeholder="Slider Button text (if need)">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Slider Button Link <small class="text-info">(Optional)</small> </label>
                              <input type="url"  name="button_link" class="form-control" id="exampleInputEmail1" placeholder="Slider Button Link (if need)">
                          </div>
                          <div class="form-group">
                              <label for="exampleInputPassword1">Slider Priority <small class="text-info">(Required)</small></label>
                              <input type="number"  name="priority" class="form-control" id="exampleInputEmail1" placeholder="Slider Priority e.g.10" value="10" required>
                            </div>
                         <button type="submit" class="btn btn-danger">Add New</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                       </form>
                    </div>
                    <div class="modal-footer">


                    </div>
                </div>
                </div>
            </div>
            {{-- end modal slider  --}}

            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Slider Title</th>
                    <th scope="col">Slider Image</th>
                    <th scope="col">Slider priority</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($sliders as $slider)
                    <tr>
                        <th scope="row">{{ $loop->index +1 }}</th>
                        <td>{{$slider->title}}</td>
                        <td>
                          <img src="{{ asset('/images/slider/'.$slider->image) }}" width="82" alt="">
                        </td>
                        <td>{{$slider->priority}}</td>
                        <td>
                            {{-- Edit modal  --}}
                            <a  href="#editModal{{ $slider->id }}" data-toggle="modal" class="btn btn-success">Edit</a>
                            {{-- delte modal  --}}
                            <a  href="#delteModal{{ $slider->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>


                            <!--Delete  Modal -->
                            <div class="modal fade" id="delteModal{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.slider.destroy',$slider->id) }}" method="POST">
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


                              <!--Edit  Modal -->
                              <div class="modal fade" id="editModal{{ $slider->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are u Sure to Update Slider?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.slider.update',$slider->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Slider Title <small class="text-danger">(Required)</small> </label>
                                            <input type="text"  name="title" class="form-control" id="exampleInputEmail1" value="{{ $slider->title}}" placeholder="Slider Title">

                                        </div>
                                        <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Image
                                                <a href="{{ asset('images/slider/'.$slider->image) }}" target="_blank">
                                                    Previous Image
                                                </a>
                                                    <small class="text-danger">(Required)</small> </label>
                                              <input type="file"  name="image" class="form-control" id="exampleInputEmail1" placeholder="Slider Image">
                                        </div>
                                        <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Button Text <small class="text-info">(Optional)</small> </label>
                                              <input type="text"  name="button_text"value="{{ $slider->button_text}}" class="form-control" id="exampleInputEmail1" placeholder="Slider Button text (if need)">
                                        </div>
                                        <div class="form-group">
                                              <label for="exampleInputEmail1">Slider Button Link <small class="text-info">(Optional)</small> </label>
                                              <input type="url"  name="button_link"value="{{ $slider->button_link}}" class="form-control" id="exampleInputEmail1" placeholder="Slider Button Link (if need)">
                                          </div>
                                          <div class="form-group">
                                              <label for="exampleInputPassword1">Slider Priority <small class="text-info">(Required)</small></label>
                                              <input type="number"  name="priority" class="form-control" id="exampleInputEmail1" value="{{ $slider->priority}}"placeholder="Slider Priority e.g.10" value="10" required>
                                            </div>
                                         <button type="submit" class="btn btn-danger">Update Slider</button>
                                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                                       </form>
                                    </div>
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
