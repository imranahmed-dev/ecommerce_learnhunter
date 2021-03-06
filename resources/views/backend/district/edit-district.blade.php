@extends('backend.layouts.master')
@section('title','Edit District')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('district.index')}}">District</a></li>
        <li class="breadcrumb-item active">Edit District</li>
    </ol>
    <h1 class="page-header">District</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit District</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('district.index') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-list"></i> District list</a>
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
                            <form action="{{route('district.update',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">District Name</label>
                                    <input type="text" name="district_name" placeholder="Sub category" value="{{$data->district_name}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('district_name'))?($errors->first('district_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Division</label>
                                    <select name="division_id" class="form-control">
                                        <option value="">Select Division</option>
                                        @foreach($divisions as $division)
                                        <option value="{{$division->id}}" @if($data->division_id == $division->id) selected @endif >{{$division->division_name}}</option>
                                        @endforeach
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('division_id'))?($errors->first('division_id')):''}}</div>
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