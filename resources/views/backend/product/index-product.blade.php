@extends('backend.layouts.master')
@section('title','Products')
@section('content')
<div id="content" class="content">
    <ol class="breadcrumb float-xl-right">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
    <h1 class="page-header">Products</h1>
    <div class="row">
        <div class="col-12">
            <div class="panel panel-inverse">

                <div class="panel-heading">
                    <h4 class="panel-title">Products List</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('product.create') }}" class="btn btn-info btn-xs mr-2"><i class="fa fa-plus-circle"></i> Add Product</a>
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
                                <td>{{@$row->subcategory->subcategory_name}}</td>
                                <td>{{$row->brand->brand_name}}</td>
                                <td>
                                    @if($row->status == 1)
                                    <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#row_status_{{$row->id}}"><i class="fa fa-check"></i> Active</a>
                                    @elseif($row->status == 2)
                                    <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#row_status_{{$row->id}}"><i class="fa fa-spinner"></i> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('product.show',$row->id)}}" class="btn btn-success btn-xs"><i class="fa fa-eye"></i> Show</a>
                                    <a href="{{route('product.edit',$row->id)}}" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a id="trash" href="{{route('product.trash',$row->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Trash</a>
                                </td>
                            </tr>
                            <!--Row Status -->
                            <div class="modal fade" id="row_status_{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('product.status', $row->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Status</label>
                                                    <select name="status" class="form-control">
                                                        <option value="1" @if( $row->status == 1 ) selected @endif >Active</option>
                                                        <option value="2" @if( $row->status == 2 ) selected @endif >Inactive</option>
                                                    </select>

                                                    <div style='color:red; padding: 0 5px;'>{{($errors->has('status'))?($errors->first('status')):''}}</div>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection