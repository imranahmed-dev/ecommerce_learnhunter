@extends('frontend.dashboard.dashboard-master')
@section('title','Profile')
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
                            <h5>About</h5>
                        </div>
                        <table class="table table-bordered table-striped table-sm">
                            <tr>
                                <th width="20%">Name</th>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            @if(Auth::user()->usertype == 3)
                            <tr>
                                <th width="20%">Designation</th>
                                <td>{{Auth::user()->designation}}</td>
                            </tr>
                            <tr>
                                <th width="20%">Degree</th>
                                <td>{{Auth::user()->degree}}</td>
                            </tr>
                            @endif
                            
                            @if(Auth::user()->usertype == 2)
                            <tr>
                                <th width="20%">Age</th>
                                <td>{{Auth::user()->age}}</td>
                            </tr>
                            @endif
                            
                            <tr>
                                <th>Email</th>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{Auth::user()->mobile}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{Auth::user()->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
