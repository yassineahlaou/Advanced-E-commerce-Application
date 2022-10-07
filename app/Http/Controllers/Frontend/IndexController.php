<?php

namespace App\Http\Controllers\Frontend;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
/*use Illuminate\Pagination\Paginator;*/
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;


use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;


use App\Models\Brand;
use App\Models\Review;
use App\Models\ReviewImages;
use App\Models\Order;
use App\Models\OrderItems;
use Carbon\Carbon;
use Image;

class IndexController extends Controller
{
    public function index(){
        return view ('frontend.index');
    }

    public function UserLogout(){
        Cache::get('user_is_online' . Auth::user()->id);
        Cache::forget('user_is_online' . Auth::user()->id);
        Auth::logout();
       
        return redirect() -> route('login');

    }

    public function UserProfile(){

        $id = Auth::user()->id;
        $userData = User::find($id);
        return view ('frontend.profile.user_profile', compact('userData'));
    }

    public function UserProfileStore (Request $request){
        $id = Auth::user()->id;
        $userData = User::find($id);
        $userData->name = $request->name;
        $userData->email = $request->email;
        $userData->phone = $request->phone;
        if ($request->file('profile_photo_path')){

            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$userData->profile_photo_path));
            $filename = date('YmdHi').$file->getClientOriginalName();//rename the file
            $file->move(public_path('upload/user_images'), $filename);//move the image to admin_images folder
            $userData['profile_photo_path'] = $filename; //store the data in database

            



        }
       

        $userData->save();
        $notification = array(
            'message' => 'Profile Updated Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notification);

        
    }

    public function UserChangePassword(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view ('frontend.profile.user_change_password', compact('userData'));
    }

    public function UserUpdatePassword (Request $request){

            $validateData = $request->validate([
                'oldpassword' => 'required',
                'password' => 'required|confirmed',
                
            ]);
           
            $hashedPassword =Auth::user()->password;
            if (Hash::check($request->oldpassword,$hashedPassword)){
                $userData = User::find(Auth::id());
                $userData->password = Hash::make($request->password);
                $userData->save();
               
                Auth::logout();

                return redirect()->route('user.logout');
            }
            else {
                return redirect()->back();

            }


    }

    public function GetProductDetails($id,$slug){
        $productData = Product::findOrFail($id); // this returns one record as object, not a collection of objects , sowe don't need to use foreach to loop through it
        $related = Product::where('category_id' , $productData->category_id)->where('status', 1)->orderBy('id', 'DESC')->get();

        
            $listcolor = array();
            $listsize = array();
            if (session()->get('language') == 'english'){

                if ($productData->product_color_en != NULL)
                   {  $colors = $productData->product_color_en;
                     $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
                
                     $colorsenglish = preg_split($pattern, $colors); 
                     $size= count($colorsenglish);
                     for ($i = 0 ; $i < $size ; $i++){

                     
                      array_push($listcolor,$colorsenglish[$i]);
                     }
                    }
                    else{$listcolor=[];}
                    if ($productData->product_size_en != NULL){
                     $sizes = $productData->product_size_en;
                     $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
                
                     $sizesenglish = preg_split($pattern, $sizes); 
                     $size= count($sizesenglish);
                     for ($i = 0 ; $i < $size ; $i++){

                     
                      array_push($listsize,$sizesenglish[$i]);
                     }}
                     else{$listsize = [];}

                        
                     

            }
            else{

                if ($productData->product_color_fr != NULL){

           
                $colors = $productData->product_color_fr;
                $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
           
                $colorsfrensh = preg_split($pattern, $colors); 
                $size= count($colorsfrensh);
                for ($i = 0 ; $i < $size ; $i++){

                
                 array_push($listcolor,$colorsfrensh[$i]);
                }
            }
            else{$listcolor=[];}
            if ($productData->product_size_fr != NULL){
                $sizes = $productData->product_size_fr;
                $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
           
                $sizesfrensh = preg_split($pattern, $sizes); 
                $size= count($sizesfrensh);
                for ($i = 0 ; $i < $size ; $i++){

                
                 array_push($listsize,$sizesfrensh[$i]);
                }

            }
            else{$listsize = [];}
       
        }

        $orders = Order::where('user_id', Auth::id())->get();
        $orderitems = OrderItems::get();

        
        return view ('frontend.products.product_details', compact('productData', 'listsize' , 'orders','orderitems','listcolor', 'related'));

    }

    /*public function paginate($items, $perPage = 2, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }*/

    public function GetProductsTag(Request $request , $tag){
        $products = Product::where('status', 1)->get();
        $listpros = array();
        $categories = Category::latest()->get();
        

        foreach($products as $pro){
            if (session()->get('language') == 'english'){

           
                     $tags = $pro->product_tags_en;
                     $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
                
                     $wordsenglish = preg_split($pattern, $tags); 

                     if (in_array($tag, $wordsenglish)){
                      array_push($listpros,$pro);

                        
                     }

            }
            else{

           
                $tags = $pro->product_tags_fr;
                $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
           
                $wordsfrensh = preg_split($pattern, $tags); 

                if (in_array($tag, $wordsfrensh)){
                 array_push($listpros,$pro);

                   
                }

       }
        }
        
        
        
       // $collection = Product::paginate(2);

        //dd($collection);
        //dd($products);
       
      // $data = $this->paginate($listpros);
        
      //$collection = Product::hydrate($listpros);
      
      
      //$collection =Product::paginate(2);

      

      //$collection = (object) $listpros;
      //$collectionp =Product::get();

      //dd(gettype($data));
      //dd($data);
      // dd($collection);

        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $productCollection = collect($listpros);
 
        // Define how many products we want to be visible in each page
        $perPage = 3;
 
        // Slice the collection to get the products to display in current page
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);
 
        // set url path for generted links
        $paginatedproducts->setPath($request->url());
       // dd($paginatedproducts);
        
        //return view ('frontend.tags.tag_view', compact('paginatedproducts','collection','products','listpros','tag' , 'categories'));

        return view('frontend.tags.tag_view', [
            'listpros' => $paginatedproducts,
            'tag' => $tag,
            'categories' => $categories,


        ]);

    }
    //always having a problem when trying to paginate $products (method links() is undefined) , so i store it in an array , that i convert to a collection, then paginate
    public function GetSubCategoryProducts($id, $slug, Request $request){
        $products = Product::where('sub_category_id', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
        //dd($products);
        $categories = Category::latest()->get();
        $breadsubcat = SubCategory::where('id',$id)->first();
        $listpros = array(); 
        

        foreach($products as $pro){
            array_push($listpros,$pro);

        }




        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $productCollection = collect($listpros);
 
        // Define how many products we want to be visible in each page
        $perPage = 2;
 
        // Slice the collection to get the products to display in current page
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);
 
        // set url path for generted links
        $paginatedproducts->setPath($request->url());

        //dd($paginatedproducts);

       

        return view ('frontend.subcategories.sub_products', [
        'listpros' => $paginatedproducts,

        
            'breadsubcat' => $breadsubcat,
       
        
        'categories' => $categories,
    ]);

    }

    public function GetCategoryProducts ($id, $slug, Request $request){

        $products = Product::where('category_id', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
        //dd($products);
        $categories = Category::latest()->get();
        $breadcat = Category::where('id',$id)->first();
        $listpros = array(); 
        

        foreach($products as $pro){
            array_push($listpros,$pro);

        }




        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $productCollection = collect($listpros);
 
        // Define how many products we want to be visible in each page
        $perPage = 2;
 
        // Slice the collection to get the products to display in current page
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);
 
        // set url path for generted links
        $paginatedproducts->setPath($request->url());

        //dd($paginatedproducts);

       

        return view ('frontend.categories.category_products', [
        'listpros' => $paginatedproducts,

        
            'breadcat' => $breadcat,
       
        
        'categories' => $categories,
    ]);


    }

    public function GetSubSubCategoryProducts($id, $slug, Request $request){

        $products = Product::where('sub_sub_category_id', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
        //dd($products);
        $categories = Category::latest()->get();
       
        $breadsubsubcat = SubSubCategory::where('id',$id)->first();
        $listpros = array(); 
        

        foreach($products as $pro){
            array_push($listpros,$pro);

        }


        // Get current page form url e.x. &page=1
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
        // Create a new Laravel collection from the array data
        $productCollection = collect($listpros);
 
        // Define how many products we want to be visible in each page
        $perPage = 2;
 
        // Slice the collection to get the products to display in current page
        $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
 
        // Create our paginator and pass it to the view
        $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);
 
        // set url path for generted links
        $paginatedproducts->setPath($request->url());

        //dd($paginatedproducts);

       

        return view ('frontend.subsubcategories.subsub_products', [
        'listpros' => $paginatedproducts,

        

       'breadsubsubcat'=>$breadsubsubcat,
        
        'categories' => $categories,
    ]);

    }


    public function GetProductViewAjax($id){
        $productData = Product::with('category','brand')->findOrFail($id);

       //$brand = Barnd::findOrFail($productData->brand_id);
        
        //$category = Category::findOrFail($productData->category_id);
        
        $listcolor = array();
        $listsize = array();
        if (session()->get('language') == 'english'){

       
                 $colors = $productData->product_color_en;
                 $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
            
                 $colorsenglish = preg_split($pattern, $colors); 
                 $size= count($colorsenglish);
                 for ($i = 0 ; $i < $size ; $i++){

                 
                  array_push($listcolor,$colorsenglish[$i]);
                 }

                 $sizes = $productData->product_size_en;
                 $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
            
                 $sizesenglish = preg_split($pattern, $sizes); 
                 $size= count($sizesenglish);
                 for ($i = 0 ; $i < $size ; $i++){

                 
                  array_push($listsize,$sizesenglish[$i]);
                 }

                    
                 

        }
        else{

       
            $colors = $productData->product_color_fr;
            $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
       
            $colorsfrensh = preg_split($pattern, $colors); 
            $size= count($colorsfrensh);
            for ($i = 0 ; $i < $size ; $i++){

            
             array_push($listcolor,$colorsfrensh[$i]);
            }

            $sizes = $productData->product_size_fr;
            $pattern = '/,|\[[^]]+\](*SKIP)(*FAIL)/';
       
            $sizesfrensh = preg_split($pattern, $sizes); 
            $size= count($sizesfrensh);
            for ($i = 0 ; $i < $size ; $i++){

            
             array_push($listsize,$sizesfrensh[$i]);
            }


   
    }
    return response()->json(array(
        'product' => $productData,
       
        'color' => $listcolor,
        'size' => $listsize,

    ));

    }
    public function GetAverageReviews($idProduct){
        $reviews = Review::where('product_id' , $idProduct)->where('status','Approved')->get();
        $total_rating = 0;

        

        if (count($reviews) != 0)
       { 
        foreach($reviews as $item){
            $total_rating =  $total_rating + $item->rating;

        }
        Product::findOrFail($idProduct)->update([
            'average_rating' => $total_rating / count($reviews),
            'total_review' => count($reviews),
        ]);}
        $product = Product::findOrFail($idProduct);
        if ($product->average_rating == NULL){
            $avRating = 0.0;

        }
        else{
            $avRating = $product->average_rating;
        }

        if ($product->total_review == NULL){
            $totRating = 0;
        }
        else{
            $totRating = $product->total_review;

        }
        return response()->json(array(
            'average_rating' =>$avRating,
           
            'total_review' => $totRating,
           
    
        ));

    }
    public function ReviewStore(Request $request , $idPro){
      
        
       
        
    	$review_id = Review::insertGetId([
    		'product_id' => $idPro,
    		'user_id' => Auth::id(),
            'rating'=>$request->rating,
    		'comment' => $request->comment,
    		'summary' => $request->summary,
            'status'=>'Pending',
    		'created_at' => Carbon::now(),

    	]);
        $images = $request->postimages;
        if ($images != NULL)
       { foreach($images as $img){
           
            $imgname = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();//rename the file
     
            
            Image::make($img)->resize(917, 1000)->save("upload/review_images/".$imgname);
            $img_url = "upload/review_images/".$imgname;
           

            ReviewImages::insert([
            'review_id'=> $review_id,
            'product_id' => $idPro,
            'user_id'=>Auth::id(),
            'photo_name' => $img_url,
            'created_at' => Carbon::now(),

        ]);
        }
}
        $reviews = Review::where('product_id' , $idPro)->where('status','Approved')->get();
        $total_rating = 0;

        

        if (count($reviews) != 0)
       { 
        foreach($reviews as $item){
            $total_rating =  $total_rating + $item->rating;

        }
        Product::findOrFail($idPro)->update([
            'average_rating' => $total_rating / count($reviews),
            'total_review' => count($reviews),
        ]);}
        return response()->json(['success' => 'Your Review is being reviewed!']);


    }

    public function ReviewsList(Request $request, $idProduct){
         $reviews = Review::with('user')->where('product_id',$idProduct)->where('status','Approved')->latest()->get();
         
         $review_images = ReviewImages::with('review')->get();

         // Get current page form url e.x. &page=1
          $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
          // Create a new Laravel collection from the array data
         // $productCollection = collect($listpros);
   
          // Define how many products we want to be visible in each page
          $perPage = 3;
   
          // Slice the collection to get the products to display in current page
          $currentPageproducts = $reviews->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
   
          // Create our paginator and pass it to the view
          $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($reviews), $perPage);
   
          // set url path for generted links
          $paginatedproducts->setPath($request->url());

         

        
    	return response()->json(array(
    		'reviews' => $paginatedproducts,
            'review_images'=>$review_images,
    		
            

    	));
    } // end method 
    

    public function GetSearchedProducts(Request $request){
        $request->validate(["search" => "required"]);

        $searchInput = $request->search;

       $products =  Product::where('product_name_en','LIKE',"%$searchInput%")->get();
       $categories = Category::latest()->get();
       
       $listpros = array(); 
       

       foreach($products as $pro){
           array_push($listpros,$pro);

       }


       // Get current page form url e.x. &page=1
       $currentPage = LengthAwarePaginator::resolveCurrentPage();

       // Create a new Laravel collection from the array data
       $productCollection = collect($listpros);

       // Define how many products we want to be visible in each page
       $perPage = 3;

       // Slice the collection to get the products to display in current page
       $currentPageproducts = $productCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->all();

       // Create our paginator and pass it to the view
       $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($productCollection), $perPage);

       // set url path for generted links
       $paginatedproducts->setPath($request->url());

       //dd($paginatedproducts);

      

       return view ('frontend.search.searched_products', [
       'listpros' => $paginatedproducts,

       'categories' => $categories,
   ]);


    }

    public function AdvancedSearch(Request $request){
        //return $request;

        $request->validate(["search" => "required"]);

		$inputsearch = $request->search;		 

		$products = Product::where('product_name_en','LIKE',"%$inputsearch%")->limit(5)->get();
		return view('frontend.search.search_product',compact('products'));
    }

    
}
