@extends('frontend.layouts.master')
@section('title','User Login')
@section('content')

<style>
    
.cat_menu_container ul {
    visibility: hidden;
    opacity: 0;
}
</style>


<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h3 style="border-bottom: 1px solid #ddd; margin-bottom: 20px;padding-bottom:4px;">Login</h3>
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
                            <button type="submit" class="btn btn-primary mb-5"><i class="fa fa-user"></i> Sign In</button>
                            <a href="#" class="btn btn-info btn-block"><i class="fab fa-facebook"></i> Login with facebook</a>
                            <a href="{{ url('login/google') }}" class="btn btn-danger btn-block"><i class="fab fa-google"></i> Login with google</a>
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