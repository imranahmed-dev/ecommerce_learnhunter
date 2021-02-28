<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Support\Str;
use Validator;


class SubcategoryController extends Controller
{
            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $data = Subcategory::latest()->get();
        return view('backend.subcategory.index-subcategory', compact('data','categories'));
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
            'subcategory_name' => 'required|unique:subcategories,subcategory_name',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Subcategory;
        $data->subcategory_name = $request->subcategory_name;
        $data->slug = Str::slug($request->subcategory_name);
        $data->category_id = $request->category_id;
        $data->save();
        
        $notification = array(
            'message' => 'Category created successfully!',
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
        $categories = Category::all();
        $data = Subcategory::find($id);
        return view('backend.subcategory.edit-subcategory', compact('data','categories'));
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
            'subcategory_name' => 'required|unique:subcategories,subcategory_name,'.$id,
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Data Not Inserted!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = Subcategory::find($id);
        $data->subcategory_name = $request->subcategory_name;
        $data->slug = Str::slug($request->subcategory_name);
        $data->category_id = $request->category_id;
        $data->save();
        
        $notification = array(
            'message' => 'Category updated successfully!',
            'alert-type' => 'success'
        );
        
        return redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Subcategory::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Sub Category deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
