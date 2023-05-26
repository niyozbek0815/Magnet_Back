<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopProduct extends Model
{
    protected $fillable=['products_id','top_type','tolov'];
    use HasFactory;
    public function type()
    {
        return $this->belongsTo(TopProductSettings::class,'id');
    }
    public function products()
    {
        return $this->belongsTo(Products::class);
    }
}
