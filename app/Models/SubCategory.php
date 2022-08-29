<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'sub_category_name_en',
        'sub_category_name_fr',
        'sub_category_slug_en',
        'sub_category_slug_fr',
        
    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
