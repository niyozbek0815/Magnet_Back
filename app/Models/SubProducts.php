<?php

namespace App\Models;

use App\Models\Products;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubProducts extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;
protected $fillable=['products_id','name','price','image'];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function orderproducts()
    {
        return $this->hasMany(OrderProducts::class);
    }

    public function mass()
    {
        return $this->hasMany(Mass::class);
    }
}
