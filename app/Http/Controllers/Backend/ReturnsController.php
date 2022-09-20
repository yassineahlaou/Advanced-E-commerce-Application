<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;

use App\Models\ReturnImages;

class ReturnsController extends Controller
{
    public function GetPendingReturns(){
        $returns = Order::where('return_status' , 'Pending')->latest()->get();
        return view ('backend.returns.pending_returns', compact('returns'));

    }
    public function ReturnDetails($id){
        $orderItems = OrderItems::where('order_id', $id)->latest()->get();
      
        
        $order = Order::where('id',$id)->first();

        $images = ReturnImages::where('order_id',$id)->latest()->get();
        
        
        return view ('backend.returns.return_details', compact('orderItems', 'order', 'images'));
    }

    public function GetApprovedReturns(){
        $returns = Order::where('return_status' , 'Approved')->latest()->get();
        return view ('backend.returns.approved_returns', compact('returns'));

    }
}
