@extends('backend.layouts.master')
@section('title','Admin Profile')
@section('content')

@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
$url = url()->current();
@endphp

<div id="content" class="content content-full-width">

    <div class="profile">
        <div class="profile-header">

            <div class="profile-header-cover"></div>


            <div class="profile-header-content">

                <div class="profile-header-img">
                    <img src="@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="">
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
        <table class="table">
            <tr><th style="width: 20%;">Name</th><td>{{Auth::user()->name}}</td></tr>
            <tr><th>Email</th><td>{{Auth::user()->email}}</td></tr>
            <tr><th>Mobile</th><td>{{Auth::user()->mobile}}</td></tr>
            <tr><th>Address</th><td>{{Auth::user()->address}}</td></tr>
        </table>
    </div>

</div>
@endsection