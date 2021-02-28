@extends('frontend.dashboard.dashboard-master')
@section('title','Dashboard')
@section('dashboard')

<div class="col-md-9">
    <div class="customer-dashboard-body">
        <div class="row">
            <div class="col-md-3">
                <div class="card dashboard-box bg-primary mb-2  ">
                    <div class="dashbox-txt">
                        <span>0</span>
                        <p>Orders</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-box bg-danger  mb-2  ">
                    <div class="dashbox-txt">
                        <span>0</span>
                        <p>Pending Patient</p>
                    </div>
                    <a href="" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card dashboard-box bg-success   mb-2  ">
                    <div class="dashbox-txt">
                        <span>0</span>
                        <p>Approved Patient</p>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card dashboard-box bg-warning   mb-2  ">
                    <div class="dashbox-txt">
                        <span class="text-dark">0</span>
                        <p class="text-dark">Rejected Patient</p>
                    </div>
                    <a href="#" class="small-box-footer text-dark">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>


        </div>


    </div>
</div>
@endsection