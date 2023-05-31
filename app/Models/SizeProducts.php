<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeProducts extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function orderproducts()
    {
        return $this->hasMany(OrderProducts::class);
    }

    protected $fillable=['products_id','size','price'];

    public function kuryer_products()
    {
        return $this->hasMany(KuryerProduct::class);
    }

}
