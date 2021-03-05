<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Order;
use App\Models\OrderDetail;

class DashboardController extends Controller
{
    public function user_dashboard(){
        return view('frontend.dashboard.dashboard');
    }
    public function user_profile()
    {
        return view('frontend.dashboard.user-profile');
    }
    public function user_edit_profile()
    {
        return view('frontend.dashboard.user-edit-profile');
    }
    public function user_profile_settings()
    {
        return view('frontend.dashboard.user-profile-settings');
    }

    public function user_update_profile(Request $request, $id)
    {

        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required|unique:users,mobile,' . $id,
            'email' => 'required|email|unique:users,email,' . $id,
            'address' => 'required',
        ]);

        $data = User::where('id', Auth::user()->id)->first();
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->save();

        $notification = array(
            'message' => 'Successfully Profile Updated!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function user_change_password()
    {
        return view('frontend.dashboard.user-change-password');
    }

    public function user_update_password(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'new_password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        if (Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])) {
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            $notification = array(
                'message' => 'Successfully password changed.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry! Your current password dost not match.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function orders(){
        $data['orders'] = Order::where('user_id', Auth::user()->id)->latest()->get();
        return view('frontend.dashboard.orders.orders',$data);
    }
    public function order_details($id){
     $data['order'] = Order::where('id',$id)->where('user_id',Auth::user()->id)->first();
        return view('frontend.dashboard.orders.order-details',$data);
    }
}
