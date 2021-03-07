<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Shipping;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
use Auth;
use Session;

class PaymentController extends Controller
{
    public function paymentProcess(Request $request)
    {
      
        $data = array(
            'name'    =>  $request->name,
            'phone'  =>  $request->phone,
            'email'  =>  $request->email,
            'division_id'  =>  $request->division_id,
            'district_id'  =>  $request->district_id,
            'address'  =>  $request->address,
            'payment_type'  =>  $request->payment,
        );

        $payment = $request->payment;
        if ($payment == 'Stripe') {
            return view('frontend.payment.stripe',$data);
        } elseif ($payment == 'Ideal') {
            return view('frontend.payment.ideal');
        } else {
            echo 'handcash';
        }
    }

    public function stripeCharge(Request $request)
    {


        \Stripe\Stripe::setApiKey('sk_test_51IRtnOCYitchOLcaejRaLPEJ8VkMp3SoVsY0lFyEHXEII8fvjd3Zb7zeBNTK1xC54TqU7zz35XqytrKUlPNfVkz2005w7pmay9');

        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
            'amount' => $request->total*100,
            'currency' => 'usd',
            'description' => 'N/A',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
        ]);

        //Orders
        $order = new Order();
        $order->user_id             = Auth::user()->id;
        $order->payment_method      = $charge->payment_method;
        $order->payment_type        = $request->payment_type;
        $order->paying_amount       = $charge->amount/100;
        $order->balance_transaction = $charge->balance_transaction;
        $order->card_order_id       = $charge->metadata->order_id;
        $order->subtotal            = Cart::subtotalFloat();
        $order->shipping_charge     = $request->shipping_charge;
        $order->vat                 = $request->vat;
        $order->coupon_discount     = $request->coupon_discount;
        $order->total               = $request->total;
        $order->date                = date('d-m-y');
        $order->month               = date('F');
        $order->year                = date('Y');
        $order->save();

        //Shipping
        $shipping = new Shipping();
        $shipping->order_id      = $order->id;
        $shipping->name          = $request->name;
        $shipping->email         = $request->email;
        $shipping->phone         = $request->phone;
        $shipping->division_id   = $request->division_id;
        $shipping->district_id   = $request->district_id;
        $shipping->address       = $request->address;
        $shipping->save();
        
        //Order Details
        foreach(Cart::content() as $row){
            $orderDetails = new OrderDetail();
            $orderDetails->order_id       = $order->id;
            $orderDetails->product_id     = $row->id;
            $orderDetails->product_name   = $row->name;
            $orderDetails->color_id       = $row->color_id;
            $orderDetails->size_id        = $row->size_id;
            $orderDetails->qty            = $row->qty;
            $orderDetails->singleprice    = $row->price;
            $orderDetails->totalprice     = $row->total;
            $orderDetails->save();
        }

         Cart::destroy();
        if(Session::has('coupon')){
            Session::forget('coupon');
        }
        $notification = array(
            'message' => 'Your order has been submited!',
            'alert-type' => 'success'
        );
        return redirect()->route('user.dashboard')->with($notification);

    }
}
