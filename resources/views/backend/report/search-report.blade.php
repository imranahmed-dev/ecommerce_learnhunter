@extends('backend.layouts.master')
@section('title','Search Report')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Search Report</li>
    </ol>
    <h1 class="page-header">Reports</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Search Report</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body table-responsive">
                    <form action="{{route('report.result.range')}}" method="post">
                        @csrf
                        <h4 class="my-3 text-info">Search By Date Range</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input type="date" name="start_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Pending Order</option>
                                        <option value="1">Confirm Order</option>
                                        <option value="2">Progress Delivvery</option>
                                        <option value="3">Success Delivery</option>
                                        <option value="4">Cancel Order</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                        <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="submit" value="Search Now" class="btn btn-success mt-2 btn-block">
                                </div>
                            </div>
                        </div>
                    </form>
                    <hr>

                    <form action="{{route('report.result.date')}}" method="post">
                        @csrf
                        <h4 class="my-3 text-primary">Search By Date</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Date</label>
                                    <input type="date" name="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Pending Order</option>
                                        <option value="1">Confirm Order</option>
                                        <option value="2">Progress Delivvery</option>
                                        <option value="3">Success Delivery</option>
                                        <option value="4">Cancel Order</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-center">
                                <input type="submit" value="Search Now" class="btn btn-success mt-2 btn-block">
                            </div>
                        </div>
                    </form>

                    <form action="{{route('report.result.month')}}" method="post">
                        @csrf
                        <h4 class="my-3 text-primary">Search By Month</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Month</label>
                                    <input type="month" name="month" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Pending Order</option>
                                        <option value="1">Confirm Order</option>
                                        <option value="2">Progress Delivvery</option>
                                        <option value="3">Success Delivery</option>
                                        <option value="4">Cancel Order</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-center">
                                <input type="submit" value="Search Now" class="btn btn-success mt-2 btn-block">
                            </div>
                        </div>
                    </form>
                    @php $years = range(2000, strftime("%Y", time())); @endphp
                    <form action="{{route('report.result.year')}}" method="post">
                        @csrf
                        <h4 class="my-3 text-primary">Search By Year</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Year</label>
                                    <select name="year" class="form-control">
                                        @foreach($years as $year)
                                        <option value="{{$year}}">{{$year}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="0">Pending Order</option>
                                        <option value="1">Confirm Order</option>
                                        <option value="2">Progress Delivvery</option>
                                        <option value="3">Success Delivery</option>
                                        <option value="4">Cancel Order</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4 align-self-center">
                                <input type="submit" value="Search Now" class="btn btn-success mt-2 btn-block">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection