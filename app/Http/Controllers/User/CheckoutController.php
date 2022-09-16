<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use App\Models\Shipping;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;


class CheckoutController extends Controller
{
    public function GetDistrictUser($division_id){
        $districts = ShippingDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($districts);
    }

    public function GetStatetUser($district_id){
        $states = ShippingState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($states);
    }

    public function CheckoutProcess(Request $request){

        $data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_email'] = $request->shipping_email;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['post_code'] = $request->post_code;
    	$data['division_id'] = $request->division_id;
    	$data['district_id'] = $request->district_id;
    	$data['state_id'] = $request->state_id;
    	$data['notes'] = $request->notes;
        $data['adrress'] = $request->adrress;

        $carts = Cart::content(); //This method will return a Collection of CartItems which you can iterate over and show the content to your customers.
    	$cartQty = Cart::count();// This method will return the total number of items in the cart
    	$cartTotal = Cart::total();

      

        

        
    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('data', 'cartTotal', 'carts', 'cartQty'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}elseif ($request->payment_method == 'cash'){
			return view('frontend.payment.cash',compact('data', 'cartTotal', 'carts', 'cartQty'));
    	}
		elseif ($request->payment_method == 'paypal'){
            return 'paypal';
    	}
		else{
			//return response()->json(['info' => 'Please Select A payment Method']);
		}



    }
}
