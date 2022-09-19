<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function ViewPending(){
        $orders = Order::where('status','Pending')->orderBy('id','DESC')->get();
		return view('backend.orders.pending_orders',compact('orders'));
    }

    public function OrderDetails($id){
        $orderItems = OrderItems::where('order_id', $id)->latest()->get();
      
        
        $order = Order::where('id',$id)->first();
        
        
        return view ('backend.orders.pending_details', compact('orderItems', 'order'));
    }

    public function ConfirmOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Confirmed',
        ]);

        $notification = array(
            'message' => 'Order Confirmed Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.pending')->with($notification);
    }
    public function ProcessOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Processing',
        ]);

        $notification = array(
            'message' => 'Order Processing Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.confirmed')->with($notification);
    }
    public function ShipOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Shipped',
        ]);

        $notification = array(
            'message' => 'Order Shipped Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.processing')->with($notification);
    }
    public function PickOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Picked',
        ]);

        $notification = array(
            'message' => 'Order Picked Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.shipped')->with($notification);
    }
    public function DeliverOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Delivered',
        ]);

        $notification = array(
            'message' => 'Order Delivered Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.picked')->with($notification);
    }

    public function CancelOrder($orderId){
        Order::findOrFail($orderId)->update([
            'status'=>'Canceled',
        ]);

        $notification = array(
            'message' => 'Order Canceld Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('view.canceled')->with($notification);

    }
    public function ViewConfirmed(){
        $orders = Order::where('status','Confirmed')->orderBy('id','DESC')->get();
		return view('backend.orders.confirmed_orders',compact('orders'));
    }
    public function ViewProcessing(){
        $orders = Order::where('status','Processing')->orderBy('id','DESC')->get();
		return view('backend.orders.processing_orders',compact('orders'));
    }
    public function ViewPicked(){
        $orders = Order::where('status','Picked')->orderBy('id','DESC')->get();
		return view('backend.orders.picked_orders',compact('orders'));
    }
    public function ViewShipped(){
        $orders = Order::where('status','Shipped')->orderBy('id','DESC')->get();
		return view('backend.orders.shipped_orders',compact('orders'));
    }
    public function ViewDelivered(){
        $orders = Order::where('status','Delivered')->orderBy('id','DESC')->get();
		return view('backend.orders.delivered_orders',compact('orders'));
    }
    public function ViewCanceled(){
        $orders = Order::where('status','Canceled')->orderBy('id','DESC')->get();
		return view('backend.orders.canceled_orders',compact('orders'));
    }

    public function AdminInvoiceDownload($orderId){
        $order = Order::where('id',$orderId)->first();
       
        $orderItems = OrderItems::where('order_id', $orderId)->latest()->get();
        //return view('frontend.profile.order_invoice',compact('orderItems', 'userData', 'order'));
        $pdf = Pdf::loadView('backend.orders.admin_invoice',compact('orderItems', 'order'))->setPaper('a4')->setOptions([
            'isPhpEnabled' => true,
            'tempDir' => public_path(),
			'chroot' => public_path(),
           
    ]);
            
        return $pdf->download('admin_invoice.pdf');
 
 
 
 
     } // end mehto
}
