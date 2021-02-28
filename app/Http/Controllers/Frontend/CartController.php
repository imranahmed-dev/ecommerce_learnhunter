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

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'size_id' => 'required',
            'color_id' => 'required',
            'qty' => 'required|min:1',
        ]);

        $product = Product::where('id', $request->product_id)->first();
        $size = Size::where('id', $request->size_id)->first();
        $color = Color::where('id', $request->color_id)->first();

        $data['qty'] = $request->qty;
        $data['id'] = $product->id;
        $data['name'] = $product->name;
        $data['price'] = $product->price;
        $data['weight'] = 0;

        $data['options']['image'] = $product->image;
        $data['options']['slug'] = $product->slug;
        $data['options']['size_id'] = $request->size_id;
        $data['options']['size'] = $size->size;
        $data['options']['color_id'] = $request->color_id;
        $data['options']['color'] = $color->color;

        Cart::add($data);

        $notification = array(
            'message' => 'Successfully Added To Cart!',
            'alert-type' => 'success'
             );
        return redirect()-> back()->with($notification,);
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
        return redirect()-> back()->with($notification,);
    }

    public function checkout(){
        if(Auth::check()){
            return view('frontend.checkout');
        }else{
            $notification = array(
                'message' => 'Please login first!',
                'alert-type' => 'error'
                 );
            return redirect()-> route('user.login')->with($notification,);
        }
    }
}
