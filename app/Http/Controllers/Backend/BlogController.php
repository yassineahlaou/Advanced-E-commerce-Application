<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPostCategory;
use Carbon\Carbon;
use Image;
use App\Models\BlogPost;
use App\Models\BlogSubscribers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;
use App\Mail\NewPostMail;
use App\Jobs\TestEmailJob;
class BlogController extends Controller
{
    public function ManageCategories(){

        $categories = BlogPostCategory::latest()->get(); //get all data
        return view ('backend.blog.manage_categories', compact('categories'));



    }
    public function AddBlogCategory(Request $request){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_fr' => 'required',
           
        ]);

            BlogPostCategory::insert([
                'category_name_en' => $request->category_name_en,
                'category_name_fr' => $request->category_name_fr,
                'category_slug_en' => strtolower(str_replace(' ', '_',$request->category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'category_slug_fr' => strtolower(str_replace(' ', '_',$request->category_name_fr)),
                'created_at'=>Carbon::now(),

            ]

            );
            $notification = array(
                'message' => 'Blog Category Added Successfully !',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);


        


        
    }
    public function EditBlogCategory($categoryId){
       
        $categoryData = BlogPostCategory::findOrFail($categoryId);
        return view ('backend.blog.edit_category', compact('categoryData'));

    }

    public function StoreBlogCategory(Request $request){
        $categoryid= $request->categoryId;
     
       

           
        BlogPostCategory::findOrFail($categoryid)->update([
                'category_name_en' => $request->category_name_en,
                'category_name_fr' => $request->category_name_fr,
                'category_slug_en' => strtolower(str_replace(' ', '_',$request->category_name_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'category_slug_fr' => strtolower(str_replace(' ', '_',$request->category_name_fr)),
                'updated_at' => Carbon::now(),
                
            ]

            );
            $notification = array(
                'message' => 'Blog Category Updated Successfully !',
                'alert-type' => 'success'
            );
    
            return redirect()->route('blog.category')->with($notification);



        
       

       


    }

    public function DeleteBlogCategory($categoryId){
        $categoryposts = BlogPost::where('category_id',$categoryId)->get();
        foreach($categoryposts as $item){
            BlogPost::where('id',$item->id)->delete();
        }
       
        BlogPostCategory::findOrFail($categoryId)->delete();

        $notification = array(
            'message' => 'Blog Category Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }

    public function ViewPosts(){

        $posts = BlogPost::latest()->get();
        return view ('backend.blog.view_posts', compact('posts'));


    }

    public function AddPost(){
        $categories = BlogPostCategory::latest()->get();
        return view ('backend.blog.add_post',compact('categories'));

    }

    public function StorePost(Request $request){
        $file = $request->file('post_image');
        $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();//rename the file
    
        //$imagePath = request('brand_image')->store('uploads', 'public');//this will be stored in storage folder that is not accessible for users, that's why in tinker we created a link to Public folder
        //$image = Image::make(public_path("upload/brand_images/".$filename))->resize(300, 300);
        Image::make($file)->resize(780,433)->save("upload/post_images/".$filename);
        $save_url = "upload/post_images/".$filename;

        
    $postId =  BlogPost::insertGetId([

             
             'category_id' => $request->category_id,
             
             'post_title_en' => $request->post_title_en,
             'post_title_fr' => $request->post_title_fr,
             'title_slug_en' => strtolower(str_replace(' ', '_',$request->post_title_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
             'title_slug_fr' => strtolower(str_replace(' ', '_',$request->post_title_fr)),
            'post_author'=>$request->post_author,
             'post_details_en' => $request->post_details_en,
             'post_details_fr' => $request->post_details_fr,
             'post_image' => $save_url,
             'status' => 1,
            
             'created_at' => Carbon::now(),
             
 
         ]);
 
             
         $postdata = BlogPost::findOrFail($postId);
         

         $subscribers = BlogSubscribers::latest()->get();

         
         
         foreach($subscribers as $subscriber){
           // dd($subscriber->email);
           dispatch(new TestEmailJob($subscriber,$postdata));
            //Mail::to($subscriber->email)->send(new NewPostMail($postdata));

         }
         
        
         


        
         $notification = array(
             'message' => 'Post Added Successfully !',
             'alert-type' => 'success'
         );

         return redirect()->route('view.posts')->with($notification);
 
    }
    public function EditPost($postId){
       $post = BlogPost::where('id',$postId)->first();
        $categories = BlogPostCategory::orderBy('category_name_en', 'ASC')->get();
        
       
        
        
        
        return view ('backend.blog.post_edit', compact('categories', 'post'));
    }
    public function UpdatePost(Request $request){
        $post_id= $request->postId;
        $post = BlogPost::find($post_id);
        if ($request->file('post_image')){

             $file = $request->file('post_image');
             unlink($post->post_image);
             $filename = hexdec(uniqid()).'.'.$file->getClientOriginalExtension();
             Image::make($file)->resize(300, 300)->save("upload/post_images/".$filename);
             $save_url = "upload/post_images/".$filename;
            
             BlogPost::findOrFail($post_id)->update([
                  
                       'category_id' => $request->category_id,
                      
                       'post_title_en' => $request->post_title_en,
                       'post_title_fr' => $request->post_title_fr,
                       'title_slug_en' => strtolower(str_replace(' ', '_',$request->post_title_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                       'title_slug_fr' => strtolower(str_replace(' ', '_',$request->post_title_fr)),
                      'post_author'=>$request->post_author,
                       'post_details_en' => $request->post_details_en,
                       'post_details_fr' => $request->post_details_fr,
                      'post_image' => $save_url,
                     
                       'updated_at' => Carbon::now(),
                ]);
        
                $notification = array(
                  'message' => 'Post Updated Successfully !',
                  'alert-type' => 'success'
              );
        
              return redirect()->route('view.posts')->with($notification);
        
 
 
 
         }
         else{
     
        


            BlogPost::findOrFail($post_id)->update([
                'category_id' => $request->category_id,
                      
                'post_title_en' => $request->post_title_en,
                'post_title_fr' => $request->post_title_fr,
                'title_slug_en' => strtolower(str_replace(' ', '_',$request->post_title_en)),//first param is what we want to replace, second whith what we will replace , last one where should we replace
                'title_slug_fr' => strtolower(str_replace(' ', '_',$request->post_title_fr)),
                'post_author'=>$request->post_author,
                'post_details_en' => $request->post_details_en,
                'post_details_fr' => $request->post_details_fr,
             //  'post_image' => $save_url,
                
                'updated_at' => Carbon::now(),
      ]);

      $notification = array(
        'message' => 'Post Updated Successfully !',
        'alert-type' => 'success'
    );

    return redirect()->route('view.posts')->with($notification);

   }

    }

    public function PostDown($postId){
          
        BlogPost::findOrFail($postId)->update([
             'status' => 0,
        ]);
        $notification = array(
             'message' => 'Post Disactivated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }

    public function PostUp($postId){
        
        BlogPost::findOrFail($postId)->update([
             'status' => 1,
        ]);
        $notification = array(
             'message' => 'Post Activated Successfully !',
             'alert-type' => 'info'
         );
   
         return redirect()->back()->with($notification);
    }

    public function DeletePost($postId){
        $post = BlogPost::findOrFail($postId);
        $postimage= $post->post_image;
        unlink($postimage);

        
        BlogPost::findOrFail($postId)->delete();

        $notification = array(
            'message' => 'Post Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function GetSubscribers(){

        $subscribers = BlogSubscribers::latest()->get(); //get all data
        return view ('backend.blog.manage_subscribers', compact('subscribers'));

    }
    public function DeleteSubscriber($subscriberId){
        $subscriber = BlogSubscribers::where('id',$subscriberId)->get();
      
        BlogSubscribers::findOrFail($subscriberId)->delete();

        $notification = array(
            'message' => 'Blog Subscriber Deleted Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);



    }



}
