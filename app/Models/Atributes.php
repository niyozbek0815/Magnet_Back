<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atributes extends Model
{
    protected $fillable=['id','sub_products_id','size_products_id','price','status'];
    use HasFactory;
    public function sizeproducts()
    {
        return $this->belongsTo(SizeProducts::class);
    }

    public function subproducts()
    {
        return $this->belongsTo(SubProducts::class);
    }
    public function products()
    {
        return $this->belongsTo(Products::class);
    }

}
