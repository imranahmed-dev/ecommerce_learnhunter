@extends('backend.layouts.master')
@section('title','Product Trash List')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Product Trash List</li>
    </ol>
    <h1 class="page-header">Products</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title">Product Trash List</h4>
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <!-- <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a> -->
                    </div>
                </div>

                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th class="text-nowrap">Image</th>
                                <th class="text-nowrap">Product Name</th>
                                <th class="text-nowrap">Category</th>
                                <th class="text-nowrap">Sub Category</th>
                                <th class="text-nowrap">Brand</th>
                                <th class="text-nowrap">Status</th>
                                <th class="text-nowrap">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            <tr class="odd gradeX">
                                <td>{{$loop->iteration}}</td>
                                <td><img width="80" src="{{asset($row->default_image)}}" alt="image"></td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->category->category_name}}</td>
                                <td>{{$row->subcategory->subcategory_name}}</td>
                                <td>{{$row->brand->brand_name}}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="javascript:;" class="btn btn-success btn-xs"><i class="fa fa-check"></i> Active</a>
                                    @elseif($row->status == 2)
                                    <a href="javascript:;" class="btn btn-danger btn-xs"><i class="fa fa-spinner"></i> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a id="restore" href="{{route('product.restore',$row->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-undo"></i> Restore</a>
                                    <a id="delete" href="{{route('product.destroy',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection