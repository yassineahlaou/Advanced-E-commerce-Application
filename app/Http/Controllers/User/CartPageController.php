<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use Carbon\Carbon;
class CartPageController extends Controller

{
    public function ViewCart(){
       
        return view ('frontend.cart.cart_view');
    }

    public function GetCartProduct(){

    	$carts = Cart::content(); //This method will return a Collection of CartItems which you can iterate over and show the content to your customers.
    	$cartQty = Cart::count();// This method will return the total number of items in the cart
    	$cartTotal = Cart::total();//can be used to get the calculated total of all items in the cart, given there price and quantity.
        
    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,

            

    	));
    }


	public function RemoveFromCart($id){

		Cart::remove($id);
		if (Session::has('coupon'))

		{
			$coupon_name = Session::get('coupon')['coupon_name'];
		$coupon = Coupon::where('coupon_name', $coupon_name)->first();

		Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
			'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
		]);
		}
        return response()->json(['success' => 'Product Successfully removed from Cart']);
	}

	public function quantityDecrement($rowId){
		$row = Cart::get($rowId);

		Cart::update($rowId, $row->qty-1); 

		if (Session::has('coupon'))

		{
			$coupon_name = Session::get('coupon')['coupon_name'];
		$coupon = Coupon::where('coupon_name', $coupon_name)->first();

		Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
			'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
		]);
		}
		return response()->json('decrement');

	}

	public function quantityIncrement($rowId){
		$row = Cart::get($rowId);

		Cart::update($rowId, $row->qty+1); 
		if (Session::has('coupon'))

		{

		$coupon_name = Session::get('coupon')['coupon_name'];
		$coupon = Coupon::where('coupon_name', $coupon_name)->first();

		Session::put('coupon',[
			'coupon_name' => $coupon->coupon_name,
			'coupon_discount' => $coupon->coupon_discount,
			'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
			'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
		]);
	}

		return response()->json('increment');

	}


	public function CouponApply(Request $request){
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
			
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100), 
                'total_amount' => round(Cart::total() - Cart::total() * $coupon->coupon_discount/100)  
			]);
            return response()->json(['success' => 'Valid Coupon']);
        }
        else{
            return response()->json(['error' => 'Invalid Coupon']);
        }

            

    }

	public function CouponCalculation(){
		if (Session::has('coupon')){
			return response()->json(array(
				'subtotal' => Cart::total(),
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
			));

		}
		else{
            return response()->json(array(
				'total' => Cart::total(),

			));
        }
	}

	public function RemoveCoupon(){
		
		Session::forget('coupon');
		return response()->json(['success' => 'Coupon Canceled']);
	}
}
