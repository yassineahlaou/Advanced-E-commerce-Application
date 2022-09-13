<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ShippingDivision;

class ShippingDistrict extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shippingDivision(){
        return $this->belongsTo(ShippingDivision::class, 'division_id', 'id');
    }
}
