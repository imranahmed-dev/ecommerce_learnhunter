@extends('backend.layouts.master')
@section('title','Edit Sub Categories')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('subcategory.index')}}">Sub Categories</a></li>
        <li class="breadcrumb-item active">Edit Sub Categories</li>
    </ol>
    <h1 class="page-header">Categories</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Sub Category</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('subcategory.index') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-tags"></i> Sub Categories</a>
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
                            <form action="{{route('subcategory.update',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Sub Category</label>
                                    <input type="text" name="subcategory_name" placeholder="Sub category" value="{{$data->subcategory_name}}" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('subcategory_name'))?($errors->first('subcategory_name')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Category</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @if($data->category_id == $category->id) selected @endif >{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('category_id'))?($errors->first('category_id')):''}}</div>
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