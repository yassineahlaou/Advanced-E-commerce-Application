<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;
use App\Models\ShippingState;


class OrderItems extends Model
{
    use HasFactory;
    protected $guarded = []; 


    public function product(){
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
   
}
