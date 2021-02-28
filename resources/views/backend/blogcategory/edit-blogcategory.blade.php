@extends('backend.layouts.master')
@section('title','Edit Blog Categories')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{route('blogcategory.index')}}">Blog Categories</a></li>
        <li class="breadcrumb-item active">Edit Blog Categories</li>
    </ol>
    <h1 class="page-header">Blog Categories</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Edit Blog Category</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('blogcategory.index') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-list"></i> Blog Category List</a>
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
                            <form action="{{route('blogcategory.update',$data->id)}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">Category Name (En)</label>
                                    <input type="text" name="category_name_en" value="{{$data->category_name_en}}" placeholder="Category name (en)" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('category_name_en'))?($errors->first('category_name_en')):''}}</div>
                                </div>
                                <div class="form-group">
                                    <label for="">Category Name (Bn)</label>
                                    <input type="text" name="category_name_bn" value="{{$data->category_name_bn}}" placeholder="Category name (bn)" class="form-control">
                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('category_name_bn'))?($errors->first('category_name_bn')):''}}</div>
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