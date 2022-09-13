<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\ShippingDivision;
use App\Models\ShippingDistrict;

class ShippingState extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function shippingDivision(){
        return $this->belongsTo(ShippingDivision::class, 'division_id', 'id');
    }
    public function shippingDistrict(){
        return $this->belongsTo(ShippingDistrict::class, 'district_id', 'id');
    }
}
