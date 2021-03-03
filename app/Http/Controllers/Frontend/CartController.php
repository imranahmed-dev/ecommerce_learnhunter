<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use Cart;
use Auth;

class CartController extends Controller
{

    public function store($id)
    {
        $product = Product::where('id', $id)->first();
        $data['id'] = $id;
        $data['name'] = $product->product_name;
        $data['qty'] = 1;
        if($product->price_active == 1){
            $data['price'] = $product->selling_price;
        }else{
            $data['price'] = $product->discount_price;
        }
        $data['weight'] = 0;
        $data['options']['image'] = $product->default_image;
    
        Cart::add($data);
        
        return response()->json(['success' => 'Successfully Added To Cart']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $data = Cart::remove($id);
        $notification = array(
            'message' => 'Successfully Cart Removed!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification,);
    }

    public function checkout()
    {
        if (Auth::check()) {
            return view('frontend.checkout');
        } else {
            $notification = array(
                'message' => 'Please login first!',
                'alert-type' => 'error'
            );
            return redirect()->route('user.login')->with($notification,);
        }
    }
}
