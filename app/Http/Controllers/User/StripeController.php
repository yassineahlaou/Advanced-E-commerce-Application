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

class StripeController extends Controller
{
    public function StripePayment(Request $request){


        if (Session::has('coupon')){
            $total_amount = Session::get('coupon')['total_amount'];

        }
        else{
            $total_amount =str_replace( ',', '', Cart::total() );
            
            
        }
    \Stripe\Stripe::setApiKey('sk_test_51LiIJNCe1Kb2UBPsAmxIPkk58sraYTacVbU6jM96yZ154rLIqLQjP6HJ9N3Z0K7A3uhuHMr43ccsazLdIExo0pmA00OX9C4B67');

        // Token is created using Checkout or Elements!
        // Get the payment token ID submitted by the form:
	$token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create([
	  'amount' => $total_amount*100,
	  'currency' => 'usd',
	  'description' => 'Ahlaou Shop',
	  'source' => $token,
	  'metadata' => ['order_id' => uniqid()],//we can put our cart options like color or size
	]);

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

     	'payment_type' => 'Stripe',
     	'payment_method' => 'Stripe',
     	'payment_type' => $charge->payment_method,
     	'transaction_id' => $charge->balance_transaction,
     	'currency' => $charge->currency,
     	'amount' => $total_amount,
     	'order_number' => $charge->metadata->order_id,

     	'invoice_no' => 'AHLAOUSHOP'.mt_rand(10000000,99999999), //mt_rand generates random id 
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'Pending',
     	'created_at' => Carbon::now(),	 

    ]);

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

    Cart::destroy();
    $notification = array(
        'message' => 'Your Order is Placed Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('dashboard')->with($notification);


}

}
