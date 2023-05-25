<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;
    protected $fillable=['categories_id','stores_id','name','description','price','sale','count','count_review','stars'];
    public function subproducts()
    {
        return $this->hasMany(SubProducts::class);
    }
    public function sizeproducts()
    {
        return $this->hasMany(SizeProducts::class);
    }
    public function orderproducts()
    {
        return $this->hasMany(orderproducts::class);
    }
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
    public function stores()
    {
        return $this->belongsTo(Stores::class);
    }
}
