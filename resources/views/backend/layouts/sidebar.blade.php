<div id="sidebar" class="sidebar">

    <div data-scrollbar="true" data-height="100%">

        <ul class="nav">
            <li class="nav-profile">
                <a href="javascript:;" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img src="@if(!empty(Auth::user()->image)) {{asset( Auth::user()->image ) }} @else {{asset('defaults/avatar/avatar.png')}} @endif" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>{{Auth::user()->name}}
                        <small>Admin</small>
                    </div>
                </a>
            </li>

            <li>
                <ul class="nav nav-profile">
                    <li><a href="{{route('admin.profile.index')}}"><i class="fa fa-user-circle"></i>Profile</a></li>
                    <li><a href="{{route('admin.profile.ep')}}"><i class="fa fa-key"></i> Change Password</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();  document.getElementById('logout-form').submit();"><i class="fa fa-sign-out"></i> Logout</a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </ul>
            </li>
        </ul>


        <ul class="nav">
            <li class="nav-header">General</li>
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map-marker"></i>
                    <span>Division</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('division.index')}}"><i class="fa fa-plus-list"></i> Division List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-map-marker"></i>
                    <span>District</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('district.index')}}"><i class="fa fa-plus-list"></i> District List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-tags"></i>
                    <span>Category & Brand</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('category.index')}}">Category</a></li>
                    <li><a href="{{route('subcategory.index')}}">Sub Category</a></li>
                    <li><a href="{{route('brand.index')}}">Brand</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gear"></i>
                    <span>Color & Size</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('color.index')}}">Color</a></li>
                    <li><a href="{{route('size.index')}}">Size</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-gear"></i>
                    <span>Coupon</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('coupon.index')}}">Coupon</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-product-hunt"></i>
                    <span>Product</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('product.create')}}"><i class="fa fa-plus-circle"></i> Add Product</a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-list"></i> Product List</a></li>
                    <li><a href="{{route('product.trash.list')}}"><i class="fa fa-trash"></i> Product Trash List</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-tags"></i>
                    <span>Blog Category</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('blogcategory.index')}}"><i class="fa fa-list"></i> Blog Category List</a></li>
                </ul>
            </li>

            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-newspaper-o"></i>
                    <span>Blog</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('blog.create')}}"><i class="fa fa-plus-circle"></i> Add Blog</a></li>
                    <li><a href="{{route('blog.index')}}"><i class="fa fa-list"></i> Blog List</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Order</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('order.pending')}}"><i class="fa fa-spinner"></i> New Order</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Others</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('newslater.index')}}"><i class="fa fa-plus-circle"></i> Newslater</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Reports</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-users"></i>
                    <span>User Role</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="{{route('admin.index')}}">Admin</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Return Order</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Product Stock</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Contact Message</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Product Comment</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret"></b>
                    <i class="fa fa-circle"></i>
                    <span>Site Settings</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="#"><i class="fa fa-plus-circle"></i> Blank</a></li>
                </ul>
            </li>


            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>

        </ul>

    </div>

</div>
<div class="sidebar-bg"></div>