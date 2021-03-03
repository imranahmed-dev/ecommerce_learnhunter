<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;

class WishlistController extends Controller
{
    public function store($id)
    {

        if (Auth::check()) {
            $check = Wishlist::where('user_id', Auth::user()->id)->where('product_id', $id)->first();
            if ($check) {
                return response()->json(['error' => 'Product allready has on your wishlist!']);
            } else {
                $data = new Wishlist();
                $data->user_id = Auth::user()->id;
                $data->product_id = $id;
                $data->save();
                return response()->json(['success' => 'Successfully Added To Wishlist']);
            }
        } else {
            return response()->json(['error' => 'At first login your account!']);
        }
    }
}
