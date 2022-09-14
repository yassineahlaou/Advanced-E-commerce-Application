<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;

class CouponController extends Controller
{
    public function ViewCoupons(){
        $coupons = Coupon::orderBy('id','DESC')->get();
        return view ('backend.coupon.coupons_view', compact('coupons'));
    }

    public function CouponAdd(Request $request){
        $request->validate([
            'coupon_name' => 'required',
            'coupon_discount' => 'required',
            'coupon_validity' => 'required',
            
        ]);
           

            Coupon::insert([
                'coupon_name' => $request->coupon_name,
                'coupon_discount' => $request->coupon_discount,
                
                'coupon_validity' => $request->coupon_validity,
                'created_at' => Carbon::now(),

            ]

            );
            $notification = array(
                'message' => 'Coupon Added Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        


        
    }

    public function CouponEdit($id){
       
        $couponData = Coupon::findOrFail($id);
        return view ('backend.coupon.coupon_edit', compact('couponData'));

    }

    public function CouponStore(Request $request){
        $id= $request->id;
        $couponData = Coupon::find($id);
        $couponData->coupon_name = $request->coupon_name;
        $couponData->coupon_discount = $request->coupon_discount;
        $couponData->coupon_validity = $request->coupon_validity;
       
      
            Coupon::findOrFail($id)->update([
                'coupon_name' => $request->coupon_name,
                'coupon_discount' => $request->coupon_discount,
                'coupon_validity' => $request->coupon_validity,
                'updated_at' => Carbon::now(),
                
                
    
            ]
    
            );
            $notification = array(
                'message' => 'Coupon Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('manage.coupon')->with($notification);

        

       


    }

    public function CouponDelete($id){
        $couponData = Coupon::findOrFail($id);
       
        
        
        Coupon::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Coupon Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function CouponDown($id){
          
        Coupon::findOrFail($id)->update([
             'status' => 0,
        ]);
        $notification = array(
             'message' => 'Coupon Disactivated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }

    public function CouponUp($id){
        
        Coupon::findOrFail($id)->update([
             'status' => 1,
        ]);
        $notification = array(
             'message' => 'Coupon Activated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }

   

}
