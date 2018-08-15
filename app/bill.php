<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill extends Model
{
    protected $table = "bills";
    public function products()
    {
        return $this->belongTo('app\products', 'id_product', 'id');
    }
    public function bill()
    {
        return $this->belongTo('app\customer', 'id_customer', 'id');
    }
}
