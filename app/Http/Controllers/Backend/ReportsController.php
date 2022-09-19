<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use DateTime;

class ReportsController extends Controller
{
    public function AllReports(){
        return view ('backend.reports.all_reports');
    }

    public function SearchByDate(Request $request){

           
        

       // $date = $request->date; // this wil return a string wich is not usable with format function, so we convert it to a date format 
       $date = new DateTime($request->date);
        $formatDate = $date->format('d F Y');
        
        

        $orders = Order::where('order_date',$formatDate)->orderBy('id','DESC')->get();
        return view ('backend.reports.data', compact('orders'));

    }
    public function SearchByMonth(Request $request){

        
       

        $orders = Order::where('order_month',$request->month)->where('order_year',$request->year)->orderBy('id','DESC')->get();
        return view ('backend.reports.data', compact('orders'));

    }
    public function SearchByYear(Request $request){

        

        $orders = Order::where('order_year',$request->year_name)->orderBy('id','DESC')->get();
        return view ('backend.reports.data', compact('orders'));

    }
}
