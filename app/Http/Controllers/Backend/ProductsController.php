<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImage;
use Carbon\Carbon;
use Image;

class ProductsController extends Controller
{
     public function AddProduct(){
          $categoryData = Category::latest()->get(); //get all data
          $subcategoryData = SubCategory::latest()->get(); //get all data
          $brandData = Brand::latest()->get(); //get all data
          $subsubcategoryData = SubSubCategory::latest()->get(); //get all data
          return view ('backend.products.add_product', compact('categoryData', 'brandData','subsubcategoryData','subcategoryData'));
        
     }
     public function GetSubCategoryAdd($category_id){
          $subcategories = SubCategory::where('category_id', $category_id)->orderBy('sub_category_name_en', 'ASC')->get();
          return json_encode($subcategories);
      }
      public function GetSubSubCategoryAdd($sub_category_id){
          $subsubcategories = SubSubCategory::where('sub_category_id', $sub_category_id)->orderBy('sub_sub_category_name_en', 'ASC')->get();
          return json_encode($subsubcategories);
      }

      public function StoreProduct(Request $request){
          $file = $request->file('product_thumbnail');
          $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file
      
          //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
          //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
          Image::make($file)->resize(917, 1000)->save("upload/product_images/".$filename);
          $save_url = "upload/product_images/".$filename;

          
          $product_id = Product::insertGetId([

               'brand_id' => $request->brand_id,
               'category_id' => $request->category_id,
               'sub_category_id' => $request->sub_category_id,
               'sub_sub_category_id' => $request->sub_sub_category_id,
               'product_name_en' => $request->product_name_en,
               'product_name_fr' => $request->product_name_fr,
               'product_slug_en' => strtolower(str_replace(' ', '_',$request->product_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
               'product_slug_fr' => strtolower(str_replace(' ', '_',$request->product_name_fr)),
               'product_code' => $request->product_code,
               'product_qty' => $request->product_qty,
               'product_tags_en' => $request->product_tags_en,
               'product_tags_fr' => $request->product_tags_fr,
               'product_size_en' => $request->product_size_en,
               'product_size_fr' => $request->product_size_fr,
               'product_color_en' => $request->product_color_en,
               'product_color_fr' => $request->product_color_fr,
               'selling_price' => $request->selling_price,
               'discount_price' => $request->discount_price,
               'short_desc_en' => $request->short_desc_en,
               'short_desc_fr' => $request->short_desc_fr,
               'long_desc_en' => $request->long_desc_en,
               'long_desc_fr' => $request->long_desc_fr,
               'product_thumbnail' => $save_url,
               'hot_deal' => $request->hot_deal,
               'featured' => $request->featured,
               'sprecial_offer' => $request->sprecial_offer,
               'speacial_deal' => $request->speacial_deal,
               'status' => 1,
               'created_at' => Carbon::now(),
               
   
           ]);
   
               

           $images = $request->file('multi_image');
           foreach($images as $img){
               $imgname = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();//rename the file
        
               //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
               //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
               Image::make($img)->resize(917, 1000)->save("upload/product_images/".$imgname);
               $img_url = "upload/product_images/".$imgname;
              

           MultiImage::insert([
               'product_id' => $product_id,
               'photo_name' => $img_url,
               'created_at' => Carbon::now(),

           ]);
           }


          
           $notification = array(
               'message' => 'Product Added Successfully !',
               'alert-type' => 'success'
           );

           return redirect()->route('manage.product')->with($notification);
   
      }

      public function ManageProduct(){
          $productsData = Product::orderBy('id', 'DESC')->get(); //get all data
          return view ('backend.products.product_manage', compact('productsData'));
  
      }

      public function EditProduct($id){
          $multiimages = MultiImage::where('product_id', $id)->get();
          //dd($multiimages[0]->photo_name);
          $productData = Product::findOrFail($id);
          $brandData = Brand::latest()->get(); //get all data
          $categories = Category::orderBy('category_name_en', 'ASC')->get();
          $subcategories = SubCategory::where('category_id', $productData->category_id)->orderBy('sub_category_name_en', 'ASC')->get();
          $subsubcategories = SubSubCategory::where('sub_category_id', $productData->sub_category_id)->orderBy('sub_sub_category_name_en', 'ASC')->get();
         
          
          
          
          return view ('backend.products.product_edit', compact('productData','categories', 'subcategories', 'brandData', 'subsubcategories','multiimages' ));
      }

      public function UpdateProduct(Request $request){
          $product_id= $request->id;
          $productData = Product::find($product_id);
          if ($request->file('product_thumbnail')){

               $file = $request->file('product_thumbnail');
               unlink($productData->product_thumbnail);
               $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
               Image::make($file)->resize(300, 300)->save("upload/product_images/".$filename);
               $save_url = "upload/product_images/".$filename;
              
               Product::findOrFail($product_id)->update([
                    'brand_id' => $request->brand_id,
                         'category_id' => $request->category_id,
                         'sub_category_id' => $request->sub_category_id,
                         'sub_sub_category_id' => $request->sub_sub_category_id,
                         'product_name_en' => $request->product_name_en,
                         'product_name_fr' => $request->product_name_fr,
                         'product_slug_en' => strtolower(str_replace(' ', '_',$request->product_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                         'product_slug_fr' => strtolower(str_replace(' ', '_',$request->product_name_fr)),
                         'product_code' => $request->product_code,
                         'product_qty' => $request->product_qty,
                         'product_tags_en' => $request->product_tags_en,
                         'product_tags_fr' => $request->product_tags_fr,
                         'product_size_en' => $request->product_size_en,
                         'product_size_fr' => $request->product_size_fr,
                         'product_color_en' => $request->product_color_en,
                         'product_color_fr' => $request->product_color_fr,
                         'selling_price' => $request->selling_price,
                         'discount_price' => $request->discount_price,
                         'short_desc_en' => $request->short_desc_en,
                         'short_desc_fr' => $request->short_desc_fr,
                         'long_desc_en' => $request->long_desc_en,
                         'long_desc_fr' => $request->long_desc_fr,
                        'product_thumbnail' => $save_url,
                         'hot_deal' => $request->hot_deal,
                         'featured' => $request->featured,
                         'sprecial_offer' => $request->sprecial_offer,
                         'speacial_deal' => $request->speacial_deal,
                         'status' => 1,
                         'updated_at' => Carbon::now(),
                  ]);
          
                  $notification = array(
                    'message' => 'Product Updated Successfully !',
                    'alert-type' => 'success'
                );
          
                return redirect()->route('manage.product')->with($notification);
          
   
   
   
           }
           else{
       
          


        Product::findOrFail($product_id)->update([
          'brand_id' => $request->brand_id,
               'category_id' => $request->category_id,
               'sub_category_id' => $request->sub_category_id,
               'sub_sub_category_id' => $request->sub_sub_category_id,
               'product_name_en' => $request->product_name_en,
               'product_name_fr' => $request->product_name_fr,
               'product_slug_en' => strtolower(str_replace(' ', '_',$request->product_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
               'product_slug_fr' => strtolower(str_replace(' ', '_',$request->product_name_fr)),
               'product_code' => $request->product_code,
               'product_qty' => $request->product_qty,
               'product_tags_en' => $request->product_tags_en,
               'product_tags_fr' => $request->product_tags_fr,
               'product_size_en' => $request->product_size_en,
               'product_size_fr' => $request->product_size_fr,
               'product_color_en' => $request->product_color_en,
               'product_color_fr' => $request->product_color_fr,
               'selling_price' => $request->selling_price,
               'discount_price' => $request->discount_price,
               'short_desc_en' => $request->short_desc_en,
               'short_desc_fr' => $request->short_desc_fr,
               'long_desc_en' => $request->long_desc_en,
               'long_desc_fr' => $request->long_desc_fr,
              // 'product_thumbnail' => $save_url,
               'hot_deal' => $request->hot_deal,
               'featured' => $request->featured,
               'sprecial_offer' => $request->sprecial_offer,
               'speacial_deal' => $request->speacial_deal,
               'status' => 1,
               'updated_at' => Carbon::now(),
        ]);

        $notification = array(
          'message' => 'Product Updated Successfully !',
          'alert-type' => 'success'
      );

      return redirect()->route('manage.product')->with($notification);

     }

      }

      public function AddMulImage(Request $request, $idproduct){
          $images = $request->file('multi_image');
          foreach($images as $img){
              $imgname = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();//rename the file
       
              //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
              //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
              Image::make($img)->resize(917, 1000)->save("upload/product_images/".$imgname);
              $img_url = "upload/product_images/".$imgname;
             

          MultiImage::insert([
              'product_id' => $idproduct,
              'photo_name' => $img_url,
              'created_at' => Carbon::now(),

          ]);
          }


         
          $notification = array(
              'message' => 'More Images Added Successfully !',
              'alert-type' => 'info'
          );

          return redirect()->back()->with($notification);


      }

      public function UpdateMulImage(Request $request){




          $images = $request->multi_image;

          if ($images != NULL)
          {
         
          foreach ($images as $id => $image) 
          {
            
                    
                    $imgDel = MultiImage::findOrFail($id);
                    //@unlink(public_path($img->photo_name));
                    unlink($imgDel->photo_name);
                    $filename = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
                    Image::make($image)->resize(917, 1000)->save("upload/product_images/".$filename);
                    $save_url = "upload/product_images/".$filename;
                    MultiImage::where('id',$id)->update([
                         'photo_name' => $save_url,
                         'updated_at' => Carbon::now()
          
                     ]
          
                     );


                    }

          $notification = array(
			'message' => 'Product Images Updated Successfully',
			'alert-type' => 'info'
		);

		return redirect()->back()->with($notification);


    }
    else{
        return redirect()->back();
    }

          
         
      }

      public function DeleteMulImage($id){
          $imgtodel = MultiImage::findOrFail($id);
          
        unlink($imgtodel->photo_name);
        MultiImage::findOrFail($id)->delete();

        $notification = array(
          'message' => 'Product Images Deleted Successfully !',
          'alert-type' => 'info'
      );

      return redirect()->back()->with($notification);

      }

      public function StatusDown($idproduct){
          
          Product::findOrFail($idproduct)->update([
               'status' => 0,
          ]);
          $notification = array(
               'message' => 'Product Disactivated Successfully !',
               'alert-type' => 'info'
           );
     
           return redirect()->back()->with($notification);
      }

      public function StatusUp($idproduct){
          
          Product::findOrFail($idproduct)->update([
               'status' => 1,
          ]);
          $notification = array(
               'message' => 'Product Activated Successfully !',
               'alert-type' => 'info'
           );
     
           return redirect()->back()->with($notification);
      }

      public function DeleteProduct($id){
          $productData = Product::findOrFail($id);
          $mainimage= $productData->product_thumbnail;
          unlink($mainimage);

          $photos = MultiImage::where('product_id', $id)->get();
          foreach ($photos as $photo){
               unlink($photo->photo_name);

          }
          MultiImage::where('product_id', $id)->delete();
          Product::findOrFail($id)->delete();
  
          $notification = array(
              'message' => 'Product Deleted Successfully !',
              'alert-type' => 'success'
          );
  
          return redirect()->back()->with($notification);
      }
}
