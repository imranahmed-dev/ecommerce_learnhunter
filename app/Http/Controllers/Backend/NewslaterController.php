<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newslater;

class NewslaterController extends Controller
{
    public function index()
    {
        $data = Newslater::latest()->get();
        return view('backend.newslater.index-newslater', compact('data'));
    }


    public function destroy($id)
    {
        $data = Newslater::find($id);
        $data->delete();

        $notification = array(
            'message' => 'Newslater deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
