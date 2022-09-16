<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItems;
use Auth;

use App\Models\User;

class UserOrders extends Controller
{
    public function GetAllUserOrders(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view ('frontend.profile.orders_list', compact('orders', 'userData'));
    }

    public function GetOrderDetails($orderId){
       $orderItems = OrderItems::where('order_id', $orderId)->latest()->get();
       $photos = array();

       
       $id = Auth::user()->id;
        $userData = User::find($id);

        
        $order = Order::where('id',$orderId)->where('user_id',Auth::id())->first();
        
        
        return view ('frontend.profile.order_items', compact('orderItems', 'userData', 'order'));

    }
}
