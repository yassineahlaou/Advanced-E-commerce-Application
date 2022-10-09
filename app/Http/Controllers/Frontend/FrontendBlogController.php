<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;
use App\Models\PostComment;
use App\Models\CommentReply;
use Auth;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
class FrontendBlogController extends Controller
{
    public function DisplayBlogPosts(Request $request){

        $allPosts=BlogPost::where('status', 1)->latest()->get(); //a collection
        $allBlogCategories = BlogPostCategory::latest()->get();
          // Get current page form url e.x. &page=1
          $currentPage = LengthAwarePaginator::resolveCurrentPage();
 
          // Create a new Laravel collection from the array data
         // $productCollection = collect($listpros);
   
          // Define how many products we want to be visible in each page
          $perPage = 2;
   
          // Slice the collection to get the products to display in current page
          $currentPageproducts = $allPosts->slice(($currentPage * $perPage) - $perPage, $perPage)->all();
   
          // Create our paginator and pass it to the view
          $paginatedproducts= new LengthAwarePaginator($currentPageproducts , count($allPosts), $perPage);
   
          // set url path for generted links
          $paginatedproducts->setPath($request->url());

          if ($request->ajax()) {
            

            $posts_ajax = view('frontend.blog.list_posts',[
                'allPosts' => $paginatedproducts,
                'addClass' => true,
                
               
    
    
            ])->render();
             return response()->json(['posts_ajax' => $posts_ajax ]);	
          }
        return view ('frontend.blog.all_posts', [
            'allPosts' => $paginatedproducts,
            'addClass' => false,
            
            'allBlogCategories' => $allBlogCategories,


        ]
    );

    }

    public function GetSearchedPosts(Request $request){
        $request->validate(["search_post" => "required"]);

        $searchPost = $request->search_post;
        $allBlogCategories = BlogPostCategory::latest()->get();
       $allPosts =  BlogPost::where('post_title_en','LIKE',"%$searchPost%")->get();
       return view ('frontend.blog.searched_posts', [
        'allPosts' => $allPosts,
        'allBlogCategories' => $allBlogCategories,
 
       
    ]);

    }

    public function GetCategoryBlog(Request $request , $catSlug){

        $categoryWanted = BlogPostCategory::where('category_slug_en' , $catSlug)->first();
        $allPosts = BlogPost::where('category_id', $categoryWanted->id)->get();
       
        $allBlogCategories = BlogPostCategory::latest()->get();
        return view ('frontend.blog.blog_category_view', [
            'allPosts' => $allPosts,
            'allBlogCategories' => $allBlogCategories,
            'categoryWanted' => $categoryWanted,
     
           
        ]);

    }

    public function GetPostDetails( $postId){
        $postClicked = BlogPost::where('id', $postId)->first();
        $comments =  $comments = PostComment::with('user')->where('post_id',$postId)->latest()->get();
        $allBlogCategories = BlogPostCategory::latest()->get();
        return view ('frontend.blog.post_details',compact('postClicked', 'allBlogCategories', 'comments'));

    }

    public function CommentsList($idPost, $limit){
        $comments = PostComment::with('user')->where('post_id',$idPost)->latest()->limit($limit)->get();
        $replies = CommentReply::with('user')->where('post_id', $idPost)->orderBy('id','ASC')->get();

       

       
       return response()->json(array(
           'comments' => $comments,
           'replies'=> $replies,
           
           
           

       ));
   } // end method 

   public function CommentStore(Request $request , $idPost){
    $validateData = $request->validate([
        'comment_details' => 'required',
      
        
    ]);
    PostComment::insert([
        'user_id'=>Auth::user()->id,
        'post_id'=>$idPost,
        'comment_details'=>$request->comment_details,
        'replies_total'=>0,
        'created_at'=>Carbon::now(),

    ]);

    return response()->json(['success' => 'Your Comment is Posted']);
   }

   public function GetTotalComments($idPost){
    $comments = PostComment::where('post_id', $idPost)->get();
    return response()->json(array(
        'total_comments' =>count($comments),
       
      

    ));
   }
   public function CommentRepliesList($idComment, $idPost){
    $replies = CommentReply::with('user')->with('comment')->where('comment_id' , $idComment)->where('post_id', $idPost)->orderBy('id','ASC')->get();
    return response()->json(array(
        'replies' =>$replies,
        'idComment'=>$idComment,
        'total' => count($replies),
       
      

    ));

}

public function ReplyStore(Request $request , $idPost, $idComment){
    $validateData = $request->validate([
        'reply_details' => 'required',
      
        
    ]);
    CommentReply::insert([
        'post_id'=>$idPost,
        'user_id'=>Auth::user()->id,
        
        'comment_id'=>$idComment,
        'reply_details'=>$request->reply_details,
        'created_at'=>Carbon::now(),

    ]);
    $comment = PostComment::where('id',$idComment)->first();
    PostComment::findOrFail($idComment)->update([
        'replies_total'=>$comment->replies_total + 1,

    ]);
    $commentAfter = PostComment::where('id',$idComment)->first();

    return response()->json([
        'success' => 'Your Reply is Posted',
        'total' => $commentAfter->replies_total,
    ]);
   }
}
