<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->get();
        return view('backend.product.index-product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        return view('backend.product.create-product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|unique:products,product_name',
            'product_code' => 'required|unique:products,product_code',
            'category_id' => 'required',
            'brand_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $product = new Product();

        $product->product_name            = $request->product_name;
        $product->product_slug            = Str::slug($request->product_name);
        $product->category_id             = $request->category_id;
        $product->subcategory_id          = $request->subcategory_id;
        $product->brand_id                = $request->brand_id;
        $product->product_code            = $request->product_code;
        $product->product_quantity        = $request->product_quantity;
        $product->selling_price           = $request->selling_price;
        $product->discount_type           = $request->discount_type;
        $product->discount                = $request->discount;
        $product->discount_price          = $request->discount_price;
        $product->price_active            = $request->price_active;
        $product->video_link              = $request->video_link;
        $product->product_description     = $request->product_description;

        $product->main_slider             = $request->main_slider;
        $product->hot_deal                = $request->hot_deal;
        $product->best_rated              = $request->best_rated;
        $product->mid_slider              = $request->mid_slider;
        $product->hot_new                 = $request->hot_new;
        $product->trend_product           = $request->trend_product;

        $product->status                  = $request->status;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(public_path('uploaded/product'), $imageName);
            $product->default_image = '/uploaded/product/' . $imageName;
        }

        // Sub image one
        $subImageOne = $request->file('sub_image_one');
        if ($subImageOne) {
            $imageName = time() . '_' . uniqid() . '.' . $subImageOne->getClientOriginalExtension();
            $subImageOne->move(public_path('uploaded/product'), $imageName);
            $product->sub_image_one = '/uploaded/product/' . $imageName;
        }

        // Sub image two
        $subImageTwo = $request->file('sub_image_two');
        if ($subImageTwo) {
            $imageName = time() . '_' . uniqid() . '.' . $subImageTwo->getClientOriginalExtension();
            $subImageTwo->move(public_path('uploaded/product'), $imageName);
            $product->sub_image_two = '/uploaded/product/' . $imageName;
        }

        $product->save();

        //Colors
        $colors = $request->color_id;
        if (!empty($colors)) {
            foreach ($colors as $color) {
                $mycolor = new ProductColor();
                $mycolor->product_id = $product->id;
                $mycolor->color_id = $color;
                $mycolor->save();
            }
        }

        //Size
        $sizes = $request->size_id;
        if (!empty($sizes)) {
            foreach ($sizes as $size) {
                $mysize = new ProductSize();
                $mysize->product_id = $product->id;
                $mysize->size_id = $size;
                $mysize->save();
            }
        }

        $notification = array(
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['colors'] = ProductColor::where('product_id', $id)->get();
        $data['sizes'] = ProductSize::where('product_id', $id)->get();
        return view('backend.product.show-product', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['subcategories'] = Subcategory::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        $data['selectColor'] = ProductColor::select('color_id')->where('product_id', $id)->orderBy('id', 'asc')->get()->toArray();
        $data['selectSize'] = ProductSize::select('size_id')->where('product_id', $id)->orderBy('id', 'asc')->get()->toArray();
        return view('backend.product.edit-product', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'product_name' => 'required|unique:products,product_name,' . $id,
            'product_code' => 'required|unique:products,product_code,' .$id,
            'category_id' => 'required',
            'brand_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $product = Product::find($id);

        $product->product_name            = $request->product_name;
        $product->product_slug            = Str::slug($request->product_name);
        $product->category_id             = $request->category_id;
        $product->subcategory_id          = $request->subcategory_id;
        $product->brand_id                = $request->brand_id;
        $product->product_code            = $request->product_code;
        $product->product_quantity        = $request->product_quantity;
        $product->selling_price           = $request->selling_price;
        $product->discount_type           = $request->discount_type;
        $product->discount                = $request->discount;
        $product->discount_price          = $request->discount_price;
        $product->price_active            = $request->price_active;
        $product->video_link              = $request->video_link;
        $product->product_description     = $request->product_description;

        $product->main_slider             = $request->main_slider;
        $product->hot_deal                = $request->hot_deal;
        $product->best_rated              = $request->best_rated;
        $product->mid_slider              = $request->mid_slider;
        $product->hot_new                 = $request->hot_new;
        $product->trend_product           = $request->trend_product;

        $product->status                  = $request->status;

        // Default image
        $defaultImage = $request->file('default_image');
        if ($defaultImage) {
            $image_path = public_path($product->default_image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $defaultImage->getClientOriginalExtension();
            $defaultImage->move(public_path('uploaded/product'), $imageName);
            $product->default_image = '/uploaded/product/' . $imageName;
        }

        // Sub image one
        $subImageOne = $request->file('sub_image_one');
        if ($subImageOne) {
            $image_path = public_path($product->sub_image_one);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $subImageOne->getClientOriginalExtension();
            $subImageOne->move(public_path('uploaded/product'), $imageName);
            $product->sub_image_one = '/uploaded/product/' . $imageName;
        }

        // Sub image two
        $subImageTwo = $request->file('sub_image_two');
        if ($subImageTwo) {
            $image_path = public_path($product->sub_image_two);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $subImageTwo->getClientOriginalExtension();
            $subImageTwo->move(public_path('uploaded/product'), $imageName);
            $product->sub_image_two = '/uploaded/product/' . $imageName;
        }

        $product->save();

        //Colors
        $colors = $request->color_id;
        if (!empty($colors)) {
            $delcolor = ProductColor::where('product_id', $id);
            $delcolor->delete();
            foreach ($colors as $color) {
                $mycolor = new ProductColor();
                $mycolor->product_id = $product->id;
                $mycolor->color_id = $color;
                $mycolor->save();
            }
        }

        //Size
        $sizes = $request->size_id;
        if (!empty($sizes)) {
            $delsize = ProductSize::where('product_id', $id);
            $delsize->delete();
            foreach ($sizes as $size) {
                $mysize = new ProductSize();
                $mysize->product_id = $product->id;
                $mysize->size_id = $size;
                $mysize->save();
            }
        }

        $notification = array(
            'message' => 'Product updated successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::onlyTrashed()->find($id);

        $image_path1 = public_path($product->default_image);
        $image_path2 = public_path($product->sub_image_one);
        $image_path3 = public_path($product->sub_image_two);

        @unlink($image_path1);
        @unlink($image_path2);
        @unlink($image_path3);

        ProductColor::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();

        $product->forceDelete();

        $notification = array(
            'message' => 'Data deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function trash($id)
    {
        Product::find($id)->delete();
        $notification = array(
            'message' => 'Successfully move to trashed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function trash_list()
    {
        $data['data'] = Product::onlyTrashed()->latest()->get();
        return view('backend.product.trash-list', $data);
    }

    public function restore($id)
    {
        Product::withTrashed()->find($id)->restore();
        $notification = array(
            'message' => 'Data restored successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function status(Request $request, $id)
    {
        $data = Product::find($id);
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
