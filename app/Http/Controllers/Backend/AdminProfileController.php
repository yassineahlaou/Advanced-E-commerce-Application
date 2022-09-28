<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Image;
use Auth;

class AdminProfileController extends Controller
{
    public function AdminProfile (){
        //$adminData = Admin::find(1);
        $id = Auth::user()->id;
		$adminData = Admin::find($id);
        return view ('admin.admin_profile_view', compact('adminData'));
    }


    public function AdminProfileEdit(){
        //$editData = Admin::find(1);
        $id = Auth::user()->id;
		$editData = Admin::find($id);
        return view ('admin.admin_profile_edit', compact('editData'));
    }

        public function AdminProfileStore (Request $request){
            //$data = Admin::find(1);
            $id = Auth::user()->id;
		    $data = Admin::find($id);
            $data->name = $request->name;
            $data->email = $request->email;

            if ($request->file('profile_photo_path')){

                $file = $request->file('profile_photo_path');
                @unlink($data->profile_photo_path);
                $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file
                
                Image::make($file)->resize(300, 300)->save("upload/admin_images/".$filename);//move the image to admin_images folder
                $data['profile_photo_path'] = "upload/admin_images/".$filename; //store the data in database



            }

            $data->save();

            $notification = array(
                'message' => 'Profile Updated Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.profile')->with($notification);





        }

        public function AdminChangePassword(){
            return view ('admin.admin_change_password');
        }

        public function AdminUpdatePassword (Request $request){

                $validateData = $request->validate([
                    'oldpassword' => 'required',
                    'password' => 'required|confirmed',
                    
                ]);
               
               
                $hashedPassword = Auth::user()->password;
                if (Hash::check($request->oldpassword,$hashedPassword)){
                    $id = Auth::user()->id;
                    $admin =Admin::find($id);
                    $admin->password = Hash::make($request->password);
                    $admin->save();
                    Auth::logout();

                    return redirect()->route('admin.logout');
                }
                else {
                    return redirect()->back();

                }


        }
 }

