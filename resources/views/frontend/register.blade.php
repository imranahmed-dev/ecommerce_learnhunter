@extends('frontend.layouts.master')
@section('title','User Register')
@section('content')

<style>
    
.cat_menu_container ul {
    visibility: hidden;
    opacity: 0;
}
</style>


<!-- Title page -->

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                    <h3 style="border-bottom: 1px solid #ddd; margin-bottom: 20px;padding-bottom:4px;">Sign Up</h3>
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="name" id="" placeholder="Full name" value="{{ old('name') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="">Mobile Number</label>
                                <input type="text" class="form-control" name="mobile" placeholder="Mobile number" value="{{ old('mobile') }}">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
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