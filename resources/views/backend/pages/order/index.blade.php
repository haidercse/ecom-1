@extends('backend.layouts.master')

@section('title')
   Order Page -Admin
@endsection

@section('admin-content')
  <div class="container">
      @include('backend.layouts.partials.message')
      <div class="card">
          <div class="card-header">
             <h3>Manage Order</h3>
          </div>
          <div class="card-body">
            <table class="table table-striped" id="dataTable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Order ID</th>
                    <th scope="col">Order Name</th>
                    <th scope="col">Order Phone No</th>
                    <th scope="col">Order Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($orders as $order)
                    <tr>
                        <th scope="row">{{ $loop->index +1}}</th>
                        <td>#ECOM{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->phone_no}}</td>
                        <td>
                           <p>
                                @if ($order->is_seen_by_admin)
                                <button type= "button" class="btn btn-success  mb-1">Seen</button>
                                @else
                                    <button type= "button" class="btn btn-warning mb-1">Unseen</button>
                                @endif
                           </p>

                            <p>
                                @if ($order->is_completed)
                                <button type= "button" class="btn btn-success mb-1">Completed</button>
                                @else
                                    <button type= "button" class="btn btn-warning mb-1 ">Not Completed</button>
                                @endif
                            </p>

                            <p>
                                @if ($order->is_paid)
                                <button type= "button" class="btn btn-success mb-1">Paid</button>
                                @else
                                    <button type= "button" class="btn btn-danger mb-1">Unpaid</button>
                                @endif
                             </p>
                        </td>
                        <td>
                            <a  href="{{ route('admin.order.show',$order->id) }}" class="btn btn-info">View Order</a>

                            <a  href="#delteModal{{ $order->id }}" data-toggle="modal" class="btn btn-danger">Delete</a>

                            <!--Delete  Modal -->
                            <div class="modal fade" id="delteModal{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete this?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                       <form action="{{ route('admin.order.destroy',$order->id) }}" method="POST">
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
