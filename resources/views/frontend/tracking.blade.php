@extends('frontend.layouts.master')
@section('title','Tracking Order')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha512-3M00D/rn8n+2ZVXBO9Hib0GKNpkm8MSUU/e2VNthDyBYxKWG+BftNYYcuEjXlyrSO637tidzMBXfE7sQm0INUg==" crossorigin="anonymous" />

<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

    .card {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.1);
        border-radius: 0.10rem
    }

    .card-header:first-child {
        border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
    }

    .card-header {
        padding: 0.75rem 1.25rem;
        margin-bottom: 0;
        background-color: #fff;
        border-bottom: 1px solid rgba(0, 0, 0, 0.1)
    }

    .track {
        position: relative;
        background-color: #ddd;
        height: 7px;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        margin-bottom: 60px;
        margin-top: 50px
    }

    .track .step {
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
        width: 25%;
        margin-top: -18px;
        text-align: center;
        position: relative
    }

    .track .step.active:before {
        background: #FF5722
    }

    .track .step::before {
        height: 7px;
        position: absolute;
        content: "";
        width: 100%;
        left: 0;
        top: 18px
    }

    .track .step.active .icon {
        background: #ee5435;
        color: #fff
    }

    .track .icon {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: relative;
        border-radius: 100%;
        background: #ddd
    }

    .track .step.active .text {
        font-weight: 400;
        color: #000
    }

    .track .text {
        display: block;
        margin-top: 7px
    }

    .itemside {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        width: 100%
    }

    .itemside .aside {
        position: relative;
        -ms-flex-negative: 0;
        flex-shrink: 0
    }

    .img-sm {
        width: 80px;
        height: 80px;
        padding: 7px
    }

    ul.row,
    ul.row-sm {
        list-style: none;
        padding: 0
    }

    .itemside .info {
        padding-left: 15px;
        padding-right: 7px
    }

    .itemside .title {
        display: block;
        margin-bottom: 5px;
        color: #212529
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem
    }

    .btn-warning {
        color: #ffffff;
        background-color: #ee5435;
        border-color: #ee5435;
        border-radius: 1px
    }

    .btn-warning:hover {
        color: #ffffff;
        background-color: #ff2b00;
        border-color: #ff2b00;
        border-radius: 1px
    }

    .cat_menu_container ul {
        visibility: hidden;
        opacity: 0;
    }
</style>

<div class="cart_section pt-5">
    <div class="container">
        <article class="card">
            <header class="card-header"> My Orders / Tracking </header>
            <div class="card-body">
                <article class="card">
                    <div class="card-body row">
                        <div class="col-md-3 mb-3 mb-md-0"> <strong>Order No #:</strong> <br> {{$order->card_order_id}} </div>
                        <div class="col-md-3 mb-3 mb-md-0"> <strong>Order Date:</strong> <br>{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y')}} </div>
                        <div class="col-md-3 mb-3 mb-md-0"> <strong>Shipping BY:</strong> <br> BLUEDART, | <i class="fa fa-phone"></i> +8801755430927 </div>
                        <div class="col-md-3 mb-3 mb-md-0"> <strong>Status:</strong> <br>
                            @if($order->status == 0)
                            Pending
                            @elseif($order->status == 1)
                            Payment Accept
                            @elseif($order->status == 2)
                            Progress Delivery
                            @elseif($order->status == 3)
                            Delivered
                            @elseif($order->status == 4)
                            Cancel
                            @endif
                        </div>

                    </div>
                </article>
                <div class="track">
                    @if($order->status == 0)
                    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-shipping-fast"></i> </span> <span class="text"> Progress Delivery</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Delivered</span></div>
                    @elseif($order->status == 1)
                    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-shipping-fast"></i> </span> <span class="text"> Progress Delivery</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Delivered</span></div>
                    @elseif($order->status == 2)
                    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-shipping-fast"></i> </span> <span class="text"> Progress Delivery</span> </div>
                    <div class="step"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Delivered</span></div>
                    @elseif($order->status == 3)
                    <div class="step active"> <span class="icon"> <i class="fa fa-spinner"></i> </span> <span class="text">Order Pending</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-shipping-fast"></i> </span> <span class="text"> Progress Delivery</span> </div>
                    <div class="step active"> <span class="icon"> <i class="fa fa-check-circle"></i> </span> <span class="text">Delivered</span></div>
                    @else

                    @endif

                </div>
                <hr>
                <div class="row">
                        <div class="col">
                            <h4 class="mb-3">Products :</h4>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-td-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th class="text-nowrap">Image</th>
                                            <th class="text-nowrap">Code</th>
                                            <th class="text-nowrap">Name</th>
                                            <th class="text-nowrap">Color</th>
                                            <th class="text-nowrap">Size</th>
                                            <th class="text-nowrap">Qty</th>
                                            <th class="text-nowrap">Price</th>
                                            <th class="text-nowrap">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($orders as $row)
                                        <tr class="odd gradeX">
                                            <td>{{$loop->iteration}}</td>
                                            <td><img style="width: 40px;" src="{{asset($row->product->default_image)}}" alt="image"></td>
                                            <td>#{{$row->product->product_code}}</td>
                                            <td>{{$row->product->product_name}}</td>
                                            <td>{{$row->color_id}}</td>
                                            <td>{{$row->size_id}}</td>
                                            <td>{{$row->qty}}</td>
                                            <td>{{$row->singleprice}}</td>
                                            <td>{{$row->totalprice}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                <hr>
                <a href="#" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
            </div>
        </article>
    </div>

</div>


@endsection