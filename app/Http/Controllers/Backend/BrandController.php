<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function BrandView(){

        $brandData = Brand::latest()->get(); //get all data
        return view ('backend.brands.brand_view', compact('brandData'));



    }
    public function BrandAdd(Request $request){
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_fr' => 'required',
            'brand_image' => 'required',
        ]);
            $file = $request->file('brand_image');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file
        
            //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
            //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
            Image::make($file)->resize(300, 300)->save("upload/brand_images/".$filename);
            $save_url = "upload/brand_images/".$filename;

            Brand::insert([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '_',$request->brand_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'brand_slug_fr' => strtolower(str_replace(' ', '_',$request->brand_name_fr)),
                'brand_image' => $save_url,

            ]

            );
            $notification = array(
                'message' => 'Brand Added Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        


        
    }
    public function BrandEdit($id){
       
        $brandData = Brand::findOrFail($id);
        return view ('backend.brands.brand_edit', compact('brandData'));

    }

    public function BrandStore(Request $request){
        $id= $request->id;
        $brandData = Brand::find($id);
        $brandData->brand_name_en = $request->brand_name_en;
        $brandData->brand_name_fr = $request->brand_name_fr;
       
        if ($request->file('brand_image')){

            $file = $request->file('brand_image');
            @unlink(public_path($brandData->brand_image));
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save("upload/brand_images/".$filename);
            $save_url = "upload/brand_images/".$filename;
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '_',$request->brand_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'brand_slug_fr' => strtolower(str_replace(' ', '_',$request->brand_name_fr)),
                'brand_image' =>  $save_url,

            ]

            );
            $notification = array(
                'message' => 'Brand Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brands')->with($notification);



        }
        else{
            Brand::findOrFail($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_fr' => $request->brand_name_fr,
                'brand_slug_en' => strtolower(str_replace(' ', '_',$request->brand_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'brand_slug_fr' => strtolower(str_replace(' ', '_',$request->brand_name_fr)),
                
                
    
            ]
    
            );
            $notification = array(
                'message' => 'Brand Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.brands')->with($notification);

        }

       


    }

    public function BrandDelete($id){
        $brandData = Brand::findOrFail($id);
        $image= $brandData->brand_image;
        unlink($image);
        
        Brand::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Brand Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }
}
