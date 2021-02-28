<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Validator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['blogs'] = Blog::latest()->get();
        return view('backend.blog.index-blog', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = BlogCategory::all();
        return view('backend.blog.create-blog',$data);
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
            'title_en' => 'required|unique:blogs,title_en',
            'title_bn' => 'required|unique:blogs,title_bn',
            'category_id' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = new Blog;
        $blog->title_en                   = $request->title_en;
        $blog->title_bn                   = $request->title_bn;
        $blog->category_id                = $request->category_id;
        $blog->slug_en                    = Str::slug($request->title_en);
        $blog->slug_bn                    = Str::slug($request->title_bn);
        $blog->description_en             = $request->description_en;
        $blog->description_bn             = $request->description_bn;
        $blog->status                     = $request->status;

        // Image
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/blog'), $imageName);
            $blog->image = '/uploaded/blog/' . $imageName;
        }

        $blog->save();

        $notification = array(
            'message' => 'Blog created successfully!',
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
        $data['blog'] = Blog::find($id);
        return view('backend.blog.show-blog', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['blog'] = Blog::find($id);
        $data['categories'] = BlogCategory::all();
        return view('backend.blog.edit-blog', $data);
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
            'title_en' => 'required|unique:blogs,title_en,'.$id,
            'title_bn' => 'required|unique:blogs,title_bn,'.$id,
            'category_id' => 'required',
            'description_en' => 'required',
            'description_bn' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wront!, Please try again...',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $blog = Blog::find($id);
        $blog->title_en                   = $request->title_en;
        $blog->title_bn                   = $request->title_bn;
        $blog->category_id                = $request->category_id;
        $blog->slug_en                    = Str::slug($request->title_en);
        $blog->slug_bn                    = Str::slug($request->title_bn);
        $blog->description_en             = $request->description_en;
        $blog->description_bn             = $request->description_bn;
        $blog->status                     = $request->status;

        // Image
        $image = $request->file('image');
        if ($image) {
            $image_path = public_path($blog->image);
            @unlink($image_path);
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/blog'), $imageName);
            $blog->image = '/uploaded/blog/' . $imageName;
        }

        $blog->save();

        $notification = array(
            'message' => 'Blog updated successfully!',
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
        $blog = Blog::find($id);
        $image_path = public_path($blog->image);
        @unlink($image_path);
        $blog->delete();

        $notification = array(
            'message' => 'Blog deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function blog_status(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->status = $request->status;
        $blog->save();

        $notification = array(
            'message' => 'Status changed successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
