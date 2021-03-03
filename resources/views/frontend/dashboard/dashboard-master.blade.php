@extends('frontend.layouts.master')
@section('content')
@php
$route = Route::current()->getName();
@endphp

<style>
    
.cat_menu_container ul {
    visibility: hidden;
    opacity: 0;
}
</style>

<!--start profile section -->
<section class="customer-dashboard clearfix pb-5 pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 pr-0">
                <div class="card customer-dashboard-menu mb-3 mb-md-0">
                    <div class="card-header bg-dark text-light customer-menu-header">
                        <h4 class="m-0 text-light">My account</h4>
                    </div>
                    <ul>

                        <li><a class="@if($route == 'user.dashboard') customer-menu-active @endif" href="{{route('user.dashboard')}}"><i class="fa fa-tachometer"></i> Dashboard</a></li>

                        <li><a class="@if($route == 'user.profile')  customer-menu-active  @endif" href="{{route('user.profile')}}"><i class="fa fa-user text-primary"></i> My Profile</a></li>

                        <li><a class="@if($route == 'user.orders')  customer-menu-active  @endif" href="{{route('user.orders')}}"><i class="fa fa-first-order text-primary"></i> My Orders</a></li>

                        <li><a class="text-primary" href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>

                    </ul>
                </div>
            </div>

            @yield('dashboard')

        </div>
    </div>
</section>
<!--end profile section -->

@endsection