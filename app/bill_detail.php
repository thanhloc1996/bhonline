<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bill_detail extends Model
{
    protected $table = "bill_detail";

    public function products()
    {
        return $this->belongTo('app\products', 'id_product', 'id');
    }
    public function bill()
    {
        return $this->belongTo('app\bill', 'id_bill', 'id');
    }
}
