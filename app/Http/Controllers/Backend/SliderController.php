<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Slider;
use Image;

class SliderController extends Controller
{
    public function SliderView(){
        $sliderData = Slider::latest()->get(); //get all data
        return view ('backend.slider.slider_view', compact('sliderData'));
    }

    public function SliderAdd(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'slider_image' => 'required',
        ]);
            $file = $request->file('slider_image');
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file
        
            //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
            //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
            Image::make($file)->resize(300, 300)->save("upload/slider_images/".$filename);
            $save_url = "upload/slider_images/".$filename;

            Slider::insert([
                'title' => $request->title,
                'description' => $request->description,
                
                'slider_image' => $save_url,

            ]

            );
            $notification = array(
                'message' => 'Slider Added Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        


        
    }

    public function SliderEdit($id){
       
        $sliderData = Slider::findOrFail($id);
        return view ('backend.slider.slider_edit', compact('sliderData'));

    }

    public function SliderStore(Request $request){
        $id= $request->id;
        $sliderData = Slider::find($id);
        $sliderData->title = $request->title;
        $sliderData->description = $request->description;
       
        if ($request->file('slider_image')){

            $file = $request->file('slider_image');
            @unlink(public_path($sliderData->slider_image));
            $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
            Image::make($file)->resize(300, 300)->save("upload/slider_images/".$filename);
            $save_url = "upload/slider_images/".$filename;
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                
                'slider_image' =>  $save_url,

            ]

            );
            $notification = array(
                'message' => 'Slider Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('slider.content')->with($notification);



        }
        else{
            Slider::findOrFail($id)->update([
                'title' => $request->title,
                'description' => $request->description,
                
                
    
            ]
    
            );
            $notification = array(
                'message' => 'Slider Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('slider.content')->with($notification);

        }

       


    }

    public function SliderDelete($id){
        $sliderData = Slider::findOrFail($id);
        $image= $sliderData->slider_image;
        unlink($image);
        
        Slider::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Slider Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function SliderDown($id){
          
        Slider::findOrFail($id)->update([
             'status' => 0,
        ]);
        $notification = array(
             'message' => 'Slider Disactivated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }

    public function SliderUp($id){
        
        Slider::findOrFail($id)->update([
             'status' => 1,
        ]);
        $notification = array(
             'message' => 'Slider Activated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }
}
