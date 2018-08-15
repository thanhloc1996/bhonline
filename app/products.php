<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = "products";
    public function type_products()
    {
        return $this->belongsTo('app\type_products', 'id_type', 'id');
    
    }
    public function bill_detail()
    {
        return $this->hasMany('app\bill_detail', 'id_product', 'id');
    }
}
