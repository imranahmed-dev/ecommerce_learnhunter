<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shipping;
use Auth;
use App\Models\Payment;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Session;

class OrderController extends Controller
{
    public function shipping_store(Request $request){

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'address' => 'required',
        ]);

        $data = new Shipping();
        $data->user_id = Auth::user()->id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->address = $request->address;
        $data->save();
        Session::put('shippingId', $data->id);
        $notification = array(
            'message' => 'Shipping address saved! please enter payment method..',
            'alert-type' => 'success'
        );
        return redirect()->route('payment')->with($notification);
    }
    public function payment(){
        return view('frontend.payment');
    }

    public function order_store(Request $request){

        $validatedData = $request->validate([
            'payment_method' => 'required',
        ]);

        $payment = new Payment();
        $payment->payment_method = $request->payment_method;
        $payment->transaction_no = $request->transaction_no;
        $payment->save();

        $order = new Order();
        $shippingId = Session::get('shippingId');

        $order->user_id = Auth::user()->id;
        $order->shipping_id = $shippingId;
        $order->payment_id = $payment->id;
        $order->order_totals = $request->order_totals;

        /*Order Number*/
        $orderData = Order::orderBy('id','desc')->first();
        if($orderData == null){
            $firstReg = '0';
            $order_no = $firstReg+1;
        }else{
            $orderData = Order::orderBy('id','desc')->first()->order_no;
            $order_no = $orderData+1;
        }
        $order->order_no = $order_no;
        $order->status = 0;
        $order->save();

        $contents = Cart::content();

        foreach($contents as $content){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $content->id;
            $orderDetails->color_id = $content->options->color_id;
            $orderDetails->size_id = $content->options->size_id;
            $orderDetails->qty = $content->qty;
            $orderDetails->save();
        }

        Cart::destroy();
        $notification = array(
            'message' => 'Successfully order has been submited..',
            'alert-type' => 'success'
        );
        return redirect()->route('user.orders')->with($notification);
        
    }
}
