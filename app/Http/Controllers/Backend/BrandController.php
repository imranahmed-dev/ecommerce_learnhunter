<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Validator;

class BrandController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Brand::latest()->get();
        return view('backend.brand.index-brand', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'brand_name' => 'required|unique:brands,brand_name',
            'brand_logo' => 'required|mimes:jpg,jpeg,png',
        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Brand;
        $data->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/brand'), $imageName);
            $data->brand_logo = '/uploaded/brand/' . $imageName;
        }
        $data->save();
        
        $notification = array(
            'message' => 'Brand created successfully!',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::find($id);
        return view('backend.brand.edit-brand', compact('data'));
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
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brands,brand_name,'.$id,
        ]);
        $data = Brand::find($id);
        $data->brand_name = $request->brand_name;
        $image = $request->file('brand_logo');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $data->brand_logo;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/brand'), $imageName);
            $data->brand_logo = '/uploaded/brand/' . $imageName;
        }
        $data->save();
        
        $notification = array(
            'message' => 'Brand updated successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('brand.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::find($id);
        $image_path = $data->brand_logo;
        @unlink(public_path($image_path));
        $data->delete();

        $notification = array(
            'message' => 'Brand deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
