<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;
use App\Models\Shipping;
use Carbon\Carbon;


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

        $request->validate([
            'division_id' => 'required',
            'district_id' => 'required',
            'state_id' => 'required',
            'shipping_name' => 'required',
            'shipping_email' => 'required',
            'shipping_phone' => 'required',
            'post_code' => 'required',
            'adrress' => 'required',
            'notes' => 'required',
           
           
            
        ]);
       // $idCategory = Category::findOrFail($request->category_id)->id();

        
       
       Shipping::insert([
        'order_id' => 45,

            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_id' => $request->state_id,
            'shipping_name' => $request->shipping_name,
            'shipping_email' => $request->shipping_email,
            'shipping_phone' => $request->shipping_phone,
            'post_code' => $request->post_code,
            'adrress' => $request->adrress,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
            
           

        ]

        );

        $res = Shipping::where('order_id', 45)->first();

        

        
    	if ($request->payment_method == 'stripe') {
    		return view('frontend.payment.stripe',compact('res'));
    	}elseif ($request->payment_method == 'card') {
    		return 'card';
    	}else{
            return 'cash';
    	}



    }
}
