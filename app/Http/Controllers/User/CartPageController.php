<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
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
}
