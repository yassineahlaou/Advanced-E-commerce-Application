<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Auth;
use App\Models\Wishlist;
use Carbon\Carbon;

class CartController extends Controller
{
    public function StoreInCart(Request $request, $id){

        $productData = Product::findOrFail($id);
        if ($productData->discount_price == NULL) {
    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name,
    			

    			'qty' => $request->quantity, 
    			'price' => $productData->selling_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $productData->product_thumbnail,
                    'slugname' => $productData->product_slug_en, 
                    'nameenglish' => $productData->product_name_en, 
                    'namefrensh' => $productData->product_name_fr, 
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);

    		return response()->json(['success' => 'Successfully Added on Your Cart']);

    	}else{

    		Cart::add([
    			'id' => $id, 
    			'name' => $request->product_name, 
    			'qty' => $request->quantity, 
    			'price' => $productData->discount_price,
    			'weight' => 1, 
    			'options' => [
    				'image' => $productData->product_thumbnail,
                    'slugname' => $productData->product_slug_en, 
                    'nameenglish' => $productData->product_name_en, 
                    'namefrensh' => $productData->product_name_fr, 
    				'color' => $request->color,
    				'size' => $request->size,
    			],
    		]);
    		return response()->json(['success' => 'Successfully Added on Your Cart']);
    	}
    }

    public function MiniCart(){

    	$carts = Cart::content(); //This method will return a Collection of CartItems which you can iterate over and show the content to your customers.
    	$cartQty = Cart::count();// This method will return the total number of items in the cart
    	$cartTotal = Cart::total();//can be used to get the calculated total of all items in the cart, given there price and quantity.
        
    	return response()->json(array(
    		'carts' => $carts,
    		'cartQty' => $cartQty,
    		'cartTotal' => $cartTotal,

            

    	));
    } // end method 


    public function RemoveFromCart($rowId){
        Cart::remove($rowId);
        return response()->json(['success' => 'Product Successfully removed from Cart']);

    }


	public function AddToWishList(Request $request ,$product_id){
		if (Auth::check()) { //check if user is logged in befor adding to wishlist

            $exists = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
			
			if ($exists == []){

            Wishlist::insert([
                'user_id' => Auth::id(), 
                'product_id' => $product_id, 
                'created_at' => Carbon::now(), 
            ]);
           return response()->json(['success' => 'Successfully Added To Your Wishlist']);
		}
		else{
			return response()->json(['error' => 'This product already exists In Your Wishlist']);

		}

        }else{

            return response()->json(['error' => 'Please Login first!']);

        }

        

    }

	

    
}
