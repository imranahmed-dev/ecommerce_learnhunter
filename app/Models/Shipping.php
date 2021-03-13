<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function division(){
        return $this->belongsTo(Division::class,'division_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class,'district_id','id');
    }
}
