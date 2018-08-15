<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
    protected $table= "type_products";
    public function products(){
        return $this->hasMany('app\products','id_type','id');
    }
}
