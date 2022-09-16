<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = []; 

    public function division(){
        return $this->belongsTo(ShippingDivision::class, 'division_id', 'id');
    }
    public function district(){
        return $this->belongsTo(ShippingDistrict::class, 'district_id', 'id');
    }
    public function state(){
        return $this->belongsTo(ShippingState::class, 'state_id', 'id');
    }
}
