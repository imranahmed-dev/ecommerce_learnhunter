@extends('frontend.layouts.master')
@section('title','Checkout')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('frontend/images/bg-01.jpg')}});">
    <h2 class="ltext-105 cl0 txt-center">
        Checkout
    </h2>
</section>
<!-- Shoping Cart -->
<section class="bg0 p-t-75 p-b-85">
    <div class="container">
        <form action="{{route('shipping.store')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xl-12" style="padding-bottom: 30px;">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" placeholder="Enter name" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" placeholder="Enter email" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Mobile</label>
                                    <input type="text" name="mobile" placeholder="Enter mobile" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" placeholder="Enter address" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">
                                    <h5>What would you like to do next?</h5>
                                    <p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
                                </th>
                            </tr>
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="total_area">
                                        <ul>
                                            <li>Sub Total <span>Tk {{Cart::subtotal()}}</span></li>
                                            <li>Tax <span> Tk {{Cart::tax()}}</span></li>
                                            <li>Shipping Cost <span>Free</span></li>
                                            <li>Total <span>Tk {{Cart::total()}}</span></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">

                            <button type="submit" class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection