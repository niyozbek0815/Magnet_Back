<?php

namespace App\Models;

use App\Models\Sellers;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stores extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable=['sellers_id','name','viloyat','tuman','maxalla','contact1','cantact2','rating','padpiska','description','logo','image'];
    public function sellers()
    {
        return $this->belongsTo(Sellers::class);
    }
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    public function topstore()
    {
        return $this->hasMany(TopStore::class);
    }

}
