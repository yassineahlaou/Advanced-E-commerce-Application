<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\ReviewImages;
use App\Models\Review;


class ReviewsController extends Controller
{
    public function GetPendingReviews(){
        $reviews = Review::where('status' , 'Pending')->latest()->get();
        return view ('backend.reviews.pending_reviews', compact('reviews'));

    }

    public function GetApprovedReviews(){
        $reviews = Review::where('status' , 'Approved')->latest()->get();
        return view ('backend.reviews.approved_reviews', compact('reviews'));

    }
    public function GetCanceledReviews(){
        $reviews = Review::where('status' , 'Canceled')->latest()->get();
        return view ('backend.reviews.canceled_reviews', compact('reviews'));

    }
    public function ReviewDetails($reviewId){
        
      
        
        $review = Review::where('id',$reviewId)->first();

        $images = ReviewImages::where('review_id',$reviewId)->latest()->get();
        
        
        return view ('backend.reviews.review_details', compact('review', 'images'));
    }

    public function ConfirmReview($reviewId){
        Review::findOrFail($reviewId)->update([
            'status'=>'Approved',
        ]);

        $notification = array(
            'message' => 'Review Approved Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('pending.reviews')->with($notification);
    }
    public function CancelReview($reviewId){
        Review::findOrFail($reviewId)->update([
            'status'=>'Canceled',
        ]);

        $notification = array(
            'message' => 'Review Canceled Successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('pending.reviews')->with($notification);
    }
}
