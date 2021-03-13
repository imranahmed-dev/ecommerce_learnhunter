<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\Coupon;
use Cart;
use Auth;
use Session;

class CartController extends Controller
{

    public function index(){
        return view('frontend.cart');
    }

    public function store($id)
    {
        $product = Product::where('id', $id)->first();
        $data['id'] = $id;
        $data['name'] = $product->product_name;
        $data['qty'] = 2;
        if($product->price_active == 1){
            $data['price'] = $product->selling_price;
        }else{
            $data['price'] = $product->discount_price;
        }
        $data['weight'] = 0;
        $data['options']['image'] = $product->default_image;
        $data['options']['color_id'] = 1;
        $data['options']['size_id'] = 1;
    
        Cart::add($data);
        
        return response()->json(['success' => 'Successfully Added To Cart']);
    }

    public function cartCount(){
        $data = Cart::count();
       return response()->json($data);
    }

    public function cartTotal(){
        $data = Cart::totalFloat();
       return response()->json($data);
    }

    public function applyCoupon(Request $request){
        $coupon = $request->coupon;
        $check = Coupon::where('coupon',$coupon)->first();
        if($check){
            Session::put('coupon',['name' => $check->coupon, 'discount' => $check->discount]);
            $notification = array(
                'message' => 'Successfully coupon applied!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }else{
            $notification = array(
                'message' => 'Invalid Coupon!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }

    }
    public function couponRemove(){
        Session::forget('coupon');
        $notification = array(
            'message' => 'Coupon Removed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
