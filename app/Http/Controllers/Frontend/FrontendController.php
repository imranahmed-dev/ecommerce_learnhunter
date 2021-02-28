<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use App\User;
use Auth;
use Validator;
use App\Models\Newslater;

class FrontendController extends Controller
{
    public function index()
    {
        $data['products'] = Product::latest()->paginate(8);
        $data['categories'] = Product::select('category_id')->get();
        $data['brands'] = Product::select('brand_id')->get();
        return view('frontend.home', $data);
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    public function cart()
    {
        return view('frontend.cart');
    }
    public function userLogin()
    {
        return view('frontend.login');
    }
    public function userRegister()
    {
        return view('frontend.register');
    }
    public function productDetails(){
        return view('frontend.product-details');
    }
    public function userStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile',
            'email' => 'required|unique:users,email',
            'address' => 'required',
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        $data = new User;
        $data->role = 2;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->password = bcrypt($request->password);
        $data->save();

        // $notification = array(
        //     'message' => 'Registration Successfully!',
        //     'alert-type' => 'success'
        //      );
        Auth::login($data, true);
        return redirect()->route('user.dashboard');
    }

    public function newslaterStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:newslaters,email',
        ]);
        if ($validator->fails()) {
            $notification = array(
                'message' => 'Something went wrong, Please try again!',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);
        }

        $data = new Newslater;
        $data->email = $request->email;
        $data->save();

        $notification = array(
            'message' => 'Thanks For Subscribing...',
            'alert-type' => 'success'
             );
        return redirect()-> back()->with($notification,);
    }
}
