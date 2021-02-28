<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }
    public function subcategory(){
        return $this->belongsTo(Subcategory::class,'subcategory_id','id');
    }
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id','id');
    }
    
}
