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
class FrontendBlogController extends Controller
{
    public function DisplayBlogPosts(){

        $allPosts=BlogPost::latest()->get();
        $allBlogCategories = BlogPostCategory::latest()->get();
        return view ('frontend.blog.all_posts', compact('allPosts','allBlogCategories'));

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

    public function CommentsList($idPost){
        $comments = PostComment::with('user')->where('post_id',$idPost)->latest()->get();
        $replies = CommentReply::with('user')->where('post_id', $idPost)->orderBy('id','ASC')->get();
       

       
       return response()->json(array(
           'comments' => $comments,
           'replies'=> $replies,
           
           
           

       ));
   } // end method 

   public function CommentStore(Request $request , $idPost){
    PostComment::insert([
        'user_id'=>Auth::user()->id,
        'post_id'=>$idPost,
        'comment_details'=>$request->comment_details,
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
       
      

    ));

}

public function ReplyStore(Request $request , $idPost, $idComment){
   // dd($idComment);
    CommentReply::insert([
        'post_id'=>$idPost,
        'user_id'=>Auth::user()->id,
        
        'comment_id'=>$idComment,
        'reply_details'=>$request->reply_details,
        'created_at'=>Carbon::now(),

    ]);

    return response()->json(['success' => 'Your Reply is Posted']);
   }
}
