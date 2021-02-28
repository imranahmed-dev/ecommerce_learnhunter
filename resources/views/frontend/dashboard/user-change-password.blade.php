@extends('frontend.dashboard.dashboard-master')
@section('title','Change Password')
@section('dashboard')

<style>
    .customer-ppn img {
        background: #fff;
        height: 120px;
        width: 120px;
        border-radius: 50%;
        padding: 3px;
        border: 1px solid #ddd;
    }

    .table th,
    .table td {
        padding-left: 15px;
    }

</style>
<div class="col-md-10">
    <div class="customer-dashboard-body card">
        <div class="card-header">
            <h5 class="m-0">My Profile</h5>
        </div>
        <!--customer profile area-->
        <div class="row">
            <div class="col">
                <div class="customer-ppn" style="background: linear-gradient(rgba(0, 0, 0, 0.45),rgba(0, 0, 0, 0.45)), url({{asset('frontend/dashboard/image/profilebg.jpg')}});">
                    <div class="customer-pp pt-4 ml-5">
                        <img src="{{(!empty(Auth::user()->image))?url(Auth::user()->image):url('frontend/dashboard/image/avatar.jpg')}}" alt="">
                    </div>
                    <h4 class=" mt-1 pb-4" style="margin-left:36px;color:#fff;">{{Auth::user()->name}}</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="customer-p-details">
                    <div class="card-body table-responsive pt-1">
                        <div class="p-about mb-3">
                            <a href="{{route('user.profile')}}" class="btn btn-success btn-sm"><i class="fa fa-info-circle"></i> About</a>
                            <a href="{{route('user.edit.profile')}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit Profile</a>
                            <a href="{{route('user.change.password')}}" class="btn btn-info btn-sm"><i class="fa fa-key"></i> Change Password</a>
                        </div>
                        <div class="pro-title mb-3">
                            <h5>Change Password</h5>
                        </div>
                        <form action="{{route('user.update.password')}}" method="post">
                            @csrf
                            <table class="table table-bordered table-striped table-sm">
                                <tr>
                                    <th width="20%">Current Password</th>
                                    <td>
                                        <input name="current_password" type="password" class="form-control" placeholder="Current password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('current_password'))?($errors->first('current_password')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">New Password</th>
                                    <td>
                                        <input name="new_password" type="password" class="form-control" placeholder="New password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('new_password'))?($errors->first('new_password')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20%">Confirm Password</th>
                                    <td>
                                        <input name="password_confirmation" type="password" class="form-control" placeholder="Confirm password">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input class="btn btn-primary btn-sm" type="submit" value="Save Changes"></td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
