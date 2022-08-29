<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Auth;
class WishlistController extends Controller
{
    public function ViewWishlist(){
       
        return view ('frontend.wishlist.wishlist_view');
    }

    public function GetWishlistProduct(){

		$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
		return response()->json($wishlist);
	} // end mehtod 

    public function RemoveFromWishList($id){

		Wishlist::where('user_id',Auth::id())->where('id',$id)->delete();
		return response()->json(['success' => 'Successfully Removed From Your Wishlist']);
	}
}
