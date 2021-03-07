<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Shipping;
use App\User;

class OrderController extends Controller
{
    public function pending()
    {
        $data['data'] = Order::where('status', 0)->latest()->get();
        return view('backend.order.pending',$data);
    }

    public function details($id){
        $user_id = Order::find($id)->user_id;
        $data['user'] = User::where('id', $user_id)->first();
        $data['orders'] = OrderDetail::where('order_id', $id)->get();
        $data['shipping'] = Shipping::where('order_id', $id)->get();

        return view('backend.order.details');
    }
}
