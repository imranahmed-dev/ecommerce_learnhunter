@extends('backend.layouts.master')
@section('title','Edit Division')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('division.index')}}">Division</a></li>
        <li class="breadcrumb-item active">Edit Division</li>
    </ol>
    <h1 class="page-header">Division</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Division</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('division.index') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-list"></i> Division list</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                <div class="row">
                <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="{{route('division.update',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Division Name</label>
                                        <input type="text" name="division_name" value="{{$data->division_name}}" placeholder="Division name" class="form-control">
                                        <div style='color:red; padding: 0 5px;'>{{($errors->has('division_name'))?($errors->first('division_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-success">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection