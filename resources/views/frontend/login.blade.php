@extends('frontend.layouts.master')
@section('title','User Login')
@section('content')
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url({{asset('frontend/images/bg-01.jpg')}});">
    <h2 class="ltext-105 cl0 txt-center">
        Login
    </h2>
</section>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <form action="{{ route('login') }}" method="post">
                            @csrf

                            <div class="form-group">
                            <label for="">Email</label>
                                <input id="email" placeholder="Email" type="email" class="form-control" name="email" value="{{ old('email') }}" autocomplete="email">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>

                            <div class="form-group">
                            <label for="">Password</label>
                                <input id="password" placeholder="Password" type="password" class="form-control" name="password" autocomplete="password">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('password'))?($errors->first('password')):''}}</div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                            <p class="my-3 text-center">
                                <a href="#">I forgot my password</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection