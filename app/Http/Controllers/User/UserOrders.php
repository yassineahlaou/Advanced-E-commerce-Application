<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItems;
use Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


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

    public function GetOrderInvoice($orderId){
        $order = Order::where('id',$orderId)->where('user_id',Auth::id())->first();
        $id = Auth::user()->id;
        $userData = User::find($id);
        $orderItems = OrderItems::where('order_id', $orderId)->latest()->get();
        //return view('frontend.profile.order_invoice',compact('orderItems', 'userData', 'order'));
        $pdf = Pdf::loadView('frontend.profile.order_invoice',compact('orderItems', 'userData', 'order'))->setPaper('a4')->setOptions([
            'isPhpEnabled' => true,
            'tempDir' => public_path(),
			'chroot' => public_path(),
           
    ]);
            
        return $pdf->download('user_invoice.pdf');
 
 
 
 
     } 

     public function ReturnOrder(Request $request , $orderId){

        Order::where('id',$orderId)->where('user_id',Auth::id())->update([
            'return_date'=>Carbon::now(),
            'return_reason'=>$request->return_reason,
        ]);

        $notification = array(
            'message' => 'Return Request Submitted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('user.returns')->with($notification);


     }

     public function GetReturns(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=' , NULL)->orderBy('id', 'DESC')->get();
        return view ('frontend.profile.user_returns', compact('orders', 'userData'));
     }

     public function GetCanceled(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        $orders = Order::where('user_id', Auth::id())->where('status', 'Canceled')->orderBy('id', 'DESC')->get();
        return view ('frontend.profile.user_canceled', compact('orders', 'userData'));
     }
}
