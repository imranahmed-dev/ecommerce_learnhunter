@extends('backend.layouts.master')
@section('title','Today Order')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Today Order</li>
    </ol>
    <h1 class="page-header">Today Order</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                <h4 style="font-size: 18px;" class="panel-title">Total Amout <span class="text-info">( ${{$totalAmount}} )</span></h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body table-responsive">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Payment Type</th>
                                <th class="text-nowrap">Transaction Id</th>
                                <th class="text-nowrap">Subtotal</th>
                                <th class="text-nowrap">Shipping</th>
                                <th class="text-nowrap">Vat</th>
                                <th class="text-nowrap">Coupon</th>
                                <th class="text-nowrap">Total</th>
                                <th class="text-nowrap">Date</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td>{{$row->payment_type}}</td>
                                <td>{{$row->balance_transaction}}</td>
                                <td>{{$row->subtotal}}</td>
                                <td>{{$row->shipping_charge}}</td>
                                <td>{{$row->vat}}</td>
                                <td>{{$row->coupon_discount}}</td>
                                <td>{{$row->total}}</td>
                                <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d M Y')}}</td>
                                <td>
                                    @if($row->status == 0)
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($row->status == 1)
                                    <span class="badge badge-info">Payment Accept</span>
                                    @elseif($row->status == 2)
                                    <span class="badge badge-info">Progress Delivery</span>
                                    @elseif($row->status == 3)
                                    <span class="badge badge-success">Delivered</span>
                                    @elseif($row->status == 4)
                                    <span class="badge badge-danger">Cancel</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('order.details',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i> View</a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection