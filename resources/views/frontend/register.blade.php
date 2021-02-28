@extends('frontend.layouts.master')
@section('title','User Register')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('frontend/images/bg-01.jpg')}});">
    <h2 class="ltext-105 cl0 txt-center">
        Register
    </h2>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Enter your name" value="{{ old('name') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile number" value="{{ old('mobile') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" name="address" rows="3" placeholder="Address">{{ old('address')}}</textarea>
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" value="{{ old('password') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="#">Confirm Password</label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" value="{{ old('password_confirmation') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                            </div>

                            <div class="col-4 text-center mx-auto">
                                <input class="btn btn-primary btn-block" type="submit" value="Register">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection