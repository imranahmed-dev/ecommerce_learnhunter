<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class ReportController extends Controller
{
    public function todayOrder(){

        $date = date('Y-m-d');
        $data['data'] = Order::where('status',0)->where('date',$date)->get();
        $data['totalAmount'] = Order::where('status',0)->where('date',$date)->sum('total');
        return view('backend.report.today-order',$data);
    }
    public function todayDelivered(){
        $date = date('Y-m-d');
        $data['data'] = Order::where('status',3)->where('date',$date)->get();
        $data['totalAmount'] = Order::where('status',3)->where('date',$date)->sum('total');
        return view('backend.report.today-delivered',$data);
    }
    public function thisMonth(){
        $month = date('Y-m');
        $data['data'] = Order::where('status',3)->where('month',$month)->get();
        $data['totalAmount'] = Order::where('status',3)->where('month',$month)->sum('total');
        return view('backend.report.this-month',$data);
    }
    public function searchReport(){
        return view('backend.report.search-report');
    }
    public function resultRange(Request $request){
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $status = $request->status;
        $data['data'] = Order::whereBetween('date', array($start_date, $end_date))->where('status',$status)->get();
        $data['totalAmount'] = Order::whereBetween('date', array($start_date, $end_date))->where('status',$status)->sum('total');
        

        return view('backend.report.search-result',$data);
    }
    public function resultDate(Request $request){
        $date = $request->date;
        $status = $request->status;
        $data['data'] = Order::where('date',$date)->where('status',$status)->get();
        $data['totalAmount'] = Order::where('date',$date)->where('status',$status)->sum('total');

        return view('backend.report.search-result',$data);
    }
    public function resultMonth(Request $request){
        $month = $request->month;
        $status = $request->status;
        $data['data'] = Order::where('month',$month)->where('status',$status)->get();
        $data['totalAmount'] = Order::where('month',$month)->where('status',$status)->sum('total');

        return view('backend.report.search-result',$data);
    }
    public function resultYear(Request $request){
        $year = $request->year;
        $status = $request->status;
        $data['data'] = Order::where('year',$year)->where('status',$status)->get();
        $data['totalAmount'] = Order::where('year',$year)->where('status',$status)->sum('total');

        return view('backend.report.search-result',$data);
    }

}
