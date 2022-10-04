<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogPostCategory;

class FrontendBlogController extends Controller
{
    public function DisplayBlogPosts(){

        $allPosts=BlogPost::latest()->get();
        $allBlogCategories = BlogPostCategory::latest()->get();
        return view ('frontend.blog.all_posts', compact('allPosts','allBlogCategories'));

    }
}
