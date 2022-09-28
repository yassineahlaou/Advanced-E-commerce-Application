<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Carbon\Carbon;
use Image;
use Auth;
use Illuminate\Support\Facades\Hash;

class ManageAdminControllerr extends Controller
{
    public function ManageAdmins(){

        if (Auth::user()->id != 1){
        $admins = Admin::where('type',2)->get(); //get all data
        }
        else{
            $admins = Admin::where('id','!=', 1)->get(); //get all data
        }
        return view ('backend.admins.manage_admins', compact('admins'));

    }

    public function AddAdmin(){
       
        return view ('backend.admins.add_admin');
      
   }

   public function StoreAdmin(Request $request){
    if ($request->file('profile_photo_path') != NULL)
   { $file = $request->file('profile_photo_path');
    $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file

    //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
    //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
    Image::make($file)->resize(917, 1000)->save("upload/admin_images/".$filename);
    $save_url = "upload/admin_images/".$filename;

    if ($request->adminuserrole == "access")
  {  Admin::insert([

         'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'password' => Hash::make($request->password),
        
         'profile_photo_path' => $save_url,

         'brand' => $request->brand,
         'categories' => $request->categories,
         'products' => $request->products,
         'slider' => $request->slider,
         'coupons' => $request->coupons,
         'shipping' => $request->shipping,
         'orders' => $request->orders,
         'users' => $request->users,
         'reports' => $request->reports,
         'returns' => $request->returns,
         'reviews' => $request->reviews,
         'adminuserrole' => $request->adminuserrole,
         'type' => 1,
        
         'created_at' => Carbon::now(),
         

     ]);}
     else{
        Admin::insert([

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
           
            'profile_photo_path' => $save_url,
   
            'brand' => $request->brand,
            'categories' => $request->categories,
            'products' => $request->products,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'users' => $request->users,
            'reports' => $request->reports,
            'returns' => $request->returns,
            'reviews' => $request->reviews,
            'adminuserrole' => $request->adminuserrole,
            'type' => 2,
           
            'created_at' => Carbon::now(),
            
   
        ]);
     }

         

    
     


    
     $notification = array(
         'message' => 'Admin Added Successfully !',
         'alert-type' => 'success'
     );

     return redirect()->route('manage.admins')->with($notification);
}
else{
    if ($request->adminuserrole == "access")
    {  Admin::insert([
  
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
          
           'profile_photo_path' => $save_url,
  
           'brand' => $request->brand,
           'categories' => $request->categories,
           'products' => $request->products,
           'slider' => $request->slider,
           'coupons' => $request->coupons,
           'shipping' => $request->shipping,
           'orders' => $request->orders,
           'users' => $request->users,
           'reports' => $request->reports,
           'returns' => $request->returns,
           'reviews' => $request->reviews,
           'adminuserrole' => $request->adminuserrole,
           'type' => 1,
          
           'created_at' => Carbon::now(),
           
  
       ]);}
       else{
          Admin::insert([
  
              'name' => $request->name,
              'email' => $request->email,
              'phone' => $request->phone,
              'password' => Hash::make($request->password),
             
              'profile_photo_path' => '',
     
              'brand' => $request->brand,
              'categories' => $request->categories,
              'products' => $request->products,
              'slider' => $request->slider,
              'coupons' => $request->coupons,
              'shipping' => $request->shipping,
              'orders' => $request->orders,
              'users' => $request->users,
              'reports' => $request->reports,
              'returns' => $request->returns,
              'reviews' => $request->reviews,
              'adminuserrole' => $request->adminuserrole,
              'type' => 2,
             
              'created_at' => Carbon::now(),
              
     
          ]);
       }
  
           
  
      
       
  
  
      
       $notification = array(
           'message' => 'Admin Added Successfully !',
           'alert-type' => 'success'
       );
  
       return redirect()->route('manage.admins')->with($notification);
}
}
public function EditAdmin($adminId){
    
    //dd($multiimages[0]->photo_name);
    $adminData = Admin::findOrFail($adminId);
    
   
    
    
    
    return view ('backend.admins.edit_admin', compact('adminData'));
}

public function UpdateAdmin(Request $request){
    $admin_id= $request->adminId;
    $adminData = Admin::find($admin_id);
    if ($request->file('profile_photo_path')){

         $file = $request->file('profile_photo_path');
         unlink($adminData->profile_photo_path);
         $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
         Image::make($file)->resize(300, 300)->save("upload/admin_images/".$filename);
         $save_url = "upload/admin_images/".$filename;
         if ($request->adminuserrole == "access")
        { Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
           
            'profile_photo_path' => $save_url,
   
            'brand' => $request->brand,
            'categories' => $request->categories,
            'products' => $request->products,
            'slider' => $request->slider,
            'coupons' => $request->coupons,
            'shipping' => $request->shipping,
            'orders' => $request->orders,
            'users' => $request->users,
            'reports' => $request->reports,
            'returns' => $request->returns,
            'reviews' => $request->reviews,
            'adminuserrole' => $request->adminuserrole,
            'type' => 1,
           
            'updated_at' => Carbon::now(),
            ]);}
            else{
                Admin::findOrFail($admin_id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make($request->password),
                   
                    'profile_photo_path' => $save_url,
           
                    'brand' => $request->brand,
                    'categories' => $request->categories,
                    'products' => $request->products,
                    'slider' => $request->slider,
                    'coupons' => $request->coupons,
                    'shipping' => $request->shipping,
                    'orders' => $request->orders,
                    'users' => $request->users,
                    'reports' => $request->reports,
                    'returns' => $request->returns,
                    'reviews' => $request->reviews,
                    'adminuserrole' => $request->adminuserrole,
                    'type' => 2,
                   
                    'updated_at' => Carbon::now(),
                    ]);
            }
    
            $notification = array(
              'message' => 'Admin Updated Successfully !',
              'alert-type' => 'success'
          );
    
          return redirect()->route('manage.admins')->with($notification);
    



     }
     else{
 
    
        if ($request->adminuserrole == "access")

  {Admin::findOrFail($admin_id)->update([
    'name' => $request->name,
         'email' => $request->email,
         'phone' => $request->phone,
         'password' => Hash::make($request->password),
        
        // 'profile_photo_path' => $save_url,

         'brand' => $request->brand,
         'categories' => $request->categories,
         'products' => $request->products,
         'slider' => $request->slider,
         'coupons' => $request->coupons,
         'shipping' => $request->shipping,
         'orders' => $request->orders,
         'users' => $request->users,
         'reports' => $request->reports,
         'returns' => $request->returns,
         'reviews' => $request->reviews,
         'adminuserrole' => $request->adminuserrole,
         'type' => 1,
        
         'updated_at' => Carbon::now(),
  ]);}
  else{
    Admin::findOrFail($admin_id)->update([
        'name' => $request->name,
             'email' => $request->email,
             'phone' => $request->phone,
             'password' => Hash::make($request->password),
            
            // 'profile_photo_path' => $save_url,
    
             'brand' => $request->brand,
             'categories' => $request->categories,
             'products' => $request->products,
             'slider' => $request->slider,
             'coupons' => $request->coupons,
             'shipping' => $request->shipping,
             'orders' => $request->orders,
             'users' => $request->users,
             'reports' => $request->reports,
             'returns' => $request->returns,
             'reviews' => $request->reviews,
             'adminuserrole' => $request->adminuserrole,
             'type' => 2,
            
             'updated_at' => Carbon::now(),
      ]);

  }

  $notification = array(
    'message' => 'Admin Updated Successfully !',
    'alert-type' => 'success'
);

return redirect()->route('manage.admins')->with($notification);

}

}

public function DeleteAdmin($adminId){
    $adminData = Admin::findOrFail($adminId);
    if ($adminData->profile_photo_path != "")
   { $image= $adminData->profile_photo_path;
    
    unlink($image);}

   
    Admin::findOrFail($adminId)->delete();

    $notification = array(
        'message' => 'Admin Deleted Successfully !',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);
}


}
