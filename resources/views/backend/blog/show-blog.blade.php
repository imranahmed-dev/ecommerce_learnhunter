@extends('backend.layouts.master')
@section('title','Blog Details')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Blog Details</li>
    </ol>
    <h1 class="page-header">Blog</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h4 class="panel-title">Blog Details</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('blog.index') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-list"></i> All Blog</a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-td-valign-middle">
                        <tr>
                            <th width="20%">Title (En)</th>
                            <td>{{$blog->title_en}}</td>
                        </tr>
                        <tr>
                            <th width="20%">Title (Bn)</th>
                            <td>{{$blog->title_bn}}</td>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <td><img width="50" src="@if(!empty($blog->image)) {{asset( $blog->image ) }} @else {{asset('defaults/noimage/no_img.jpg')}} @endif" alt=""></td>
                        </tr>
                        <tr>
                            <th>Category (En)</th>
                            <td>{{$blog->category->category_name_en}}</td>
                        </tr>

                        <tr>
                            <th>Category (Bn)</th>
                            <td>{{$blog->category->category_name_bn}}</td>
                        </tr>

                        <tr>
                            <th>Description (En)</th>
                            <td>{!!$blog->description_en!!}</td>
                        </tr>
                        <tr>
                            <th>Description (Bn)</th>
                            <td>{!!$blog->description_bn!!}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($blog->status == 1)
                                    <button class="btn btn-success btn-sm"><i class="fa fa-check"></i> Active</button>
                                @else
                                <button class="btn btn-danger btn-sm"><i class="fa fa-spinner"></i> Inactive</button>
                                @endif
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection