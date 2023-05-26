<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopProductSettings extends Model
{
    protected $fillable=['start','stop','name_uz','name_kr','name_ru','name_en','summa','continuity'];
    use HasFactory;
    public function topproducts()
    {
        return $this->hasMany(TopProduct::class,'top_type');
    }
}
