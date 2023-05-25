<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    use HasFactory;
protected $fillable=['orders_id','products_id','sub_products_id','size_products_id','price','count'];
    public function orders()
    {
        return $this->belongsTo(Orders::class);
    }
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
    public function subproducts()
    {
        return $this->belongsTo(SubProducts::class);
    }
    public function sizeproducts()
    {
        return $this->belongsTo(SizeProducts::class);
    }
}
