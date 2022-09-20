<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderItems;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CashController extends Controller
{
    public function CashOnDelivery(Request $request){


        if (Session::has('coupon')){
            $total_amount_after = Session::get('coupon')['total_amount'];

            $total_amount_before = str_replace( ',', '', Cart::total() );

            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon_discount = Session::get('coupon')['coupon_discount'];

        }
        else{
            $coupon_name = NULL;
            $coupon_discount = NULL;
            $total_amount_before = str_replace( ',', '', Cart::total() );
            $total_amount_after =str_replace( ',', '', Cart::total() );
            
            
        }
   


	$order_id = Order::insertGetId([
        'user_id' => Auth::id(),
       
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'post_code' => $request->post_code,
         'adrress' => $request->adrress,
     	'notes' => $request->notes,

     	'payment_type' => 'CashOnDelivery',
     	'payment_method' => 'CashOnDelivery',
     	
     	'currency' => 'USD',
     	'amount_before' =>  $total_amount_before,
         'coupon_name' => $coupon_name,
        'coupon_discount' => $coupon_discount,
         'amount_after' =>  $total_amount_after,
     	'order_number' => uniqid(),

     	'invoice_no' => 'AHLAOUSHOP'.mt_rand(10000000,99999999), //mt_rand generates random id 
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'Pending',
     	'created_at' => Carbon::now(),	 

    ]);

    //sending email

    $invoiceData = Order::findOrFail($order_id);
    $data=[
        'invoice_no' => $invoiceData->invoice_no,
        'amount' => $invoiceData->amount_after,
        'name' => $invoiceData->name,
        'email' => $invoiceData->email,

        
    ];
    Mail::to($request->email)->send(new OrderMail($invoiceData));


    $carts = Cart::content();

    foreach ($carts as $item){

        OrderItems::insert([
            'order_id' => $order_id, //that is why we user before insertGetId , to store Order model data in that id
            'product_id' => $item->id,
            'color' => $item->options->color,
            'size' => $item->options->size,
            'qty'=>$item->qty,
            'price'=>$item->price,
            'created_at' => Carbon::now(),	 

        ]);
    }

    if (Session::has('coupon')){
        Session::forget('coupon');
    }

    Cart::destroy(); // empty cart after order process
    $notification = array(
        'message' => 'Your Order is Placed Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('user.orders')->with($notification);


}
}
