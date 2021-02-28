@extends('backend.layouts.master')
@section('title','Admin Edit Profile')
@section('content')

@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$url = url()->current();
@endphp

<style>
    .form-control {
        background: #fff;
        border: none;
    }
</style>

<div id="content" class="content content-full-width">

    <div class="profile">
        <div class="profile-header">

            <div class="profile-header-cover"></div>


            <div class="profile-header-content">

                <div class="profile-header-img">
                    <img id="showNoImage" src="@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="">
                </div>


                <div class="profile-header-info" style="margin-top: 20px;">
                    <h4 class="mt-0 mb-1">{{Auth::user()->name}}</h4>
                    <p class="mb-2">Admin</p>
                </div>

            </div>

            <ul class="profile-header-tab nav">
                <li class="nav-item"><a href="{{route('admin.profile.index')}}" class="nav-link @if($route == 'admin.profile.index') active @endif"><i class="fa fa-info-circle"></i> ABOUT</a></li>
                <li class="nav-item"><a href="{{route('admin.profile.edit')}}" class="nav-link @if($route == 'admin.profile.edit') active @endif"><i class="fa fa-edit"></i> EDIT PROFILE</a></li>
                <li class="nav-item"><a href="{{route('admin.profile.ep')}}" class="nav-link @if($route == 'admin.profile.ep') active @endif"><i class="fa fa-key"></i> CHANGE PASSWORD</a></li>
            </ul>

        </div>
    </div>


    <div class="profile-content card" style="background: #fafafa;">
        <form action="{{route('admin.profile.update')}}" method="post" enctype="multipart/form-data">
            @csrf
            <table class="table">
                <tr>
                    <th>Profile Picture</th>
                    <td>
                        <input id="noImage" type="file" class="form-control form-control-sm" name="image">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('image'))?($errors->first('image')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th style="width: 20%;">Name</th>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="name" placeholder="Name" value="{{Auth::user()->name}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('name'))?($errors->first('name')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="email" placeholder="Email" value="{{Auth::user()->email}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('email'))?($errors->first('email')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="mobile" placeholder="Mobile" value="{{Auth::user()->mobile}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('mobile'))?($errors->first('mobile')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" class="form-control form-control-sm" name="address" placeholder="Address" value="{{Auth::user()->address}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('address'))?($errors->first('address')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Action</th>
                    <td><button type="submit" class="btn btn-success">Update</button></td>
                </tr>
            </table>
        </form>
    </div>

</div>
@endsection