<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewImages extends Model
{
    use HasFactory;
    protected $guarded = []; 


    public function review(){
        return $this->belongsTo(Review::class, 'review_id', 'id');
    }
    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user(){
        return $this->belongsTo(Review::class, 'user_id', 'id');
    }
}
