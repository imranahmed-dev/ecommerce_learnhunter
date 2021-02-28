@extends('backend.layouts.master')
@section('title','Admin Edit Password')
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
        <form action="{{route('admin.profile.up')}}" method="post">
            @csrf
            <table class="table">
                <tr>
                    <th style="width: 20%;">Current Password</th>
                    <td>
                    <input class="form-control" type="password" name="current_password" placeholder="Current password" value="{{old('current_password')}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('current_password'))?($errors->first('current_password')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>New Password</th>
                    <td>
                    <input class="form-control" type="password" name="new_password" placeholder="New password" value="{{old('new_password')}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('new_password'))?($errors->first('new_password')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Confirm Password</th>
                    <td>
                    <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm password" value="{{old('password_confirmation')}}">
                        <div style='color:red; padding: 0 5px;'>{{($errors->has('password_confirmation'))?($errors->first('password_confirmation')):''}}</div>
                    </td>
                </tr>
                <tr>
                    <th>Action</th>
                    <td><button type="submit" class="btn btn-success">Save Changes</button></td>
                </tr>
            </table>
        </form>
    </div>

</div>
@endsection