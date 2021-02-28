@extends('frontend.dashboard.dashboard-master')
@section('title','Orders')
@section('dashboard')
<div class="col-md-10">
    <div class="customer-dashboard-body">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0">My Orders</h5>
            </div>
            <div class="card-body table-responsive text-nowrap">
                <table id="example1" class="table table-bordered table-striped table-sm">
                    <thead class="thead-dark">

                        <tr>
                            <th>SN</th>
                            <th>Order No</th>
                            <th>Total Amount</th>
                            <th>Payment Method</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>#{{$order->order_no}}</td>
                            <td>Tk {{$order->order_totals}}</td>
                            <td>{{$order->payment->payment_method}}</td>
                            <td>
                                @if($order->status == 0)
                                <span class="badge badge-danger">Pending</span>
                                @else
                                <span class="badge badge-success">Approved</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('user.order.details', $order->id)}}"><i class="fa fa-eye"></i> Details</a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection